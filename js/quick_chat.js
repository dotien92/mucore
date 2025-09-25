(function (win, doc, $) {
    if (typeof $ === 'undefined') {
        return;
    }

    var cfg = win.quickChatConfig || {};
    var endpoint = cfg.endpoint || '';
    var canPost = !!cfg.canPost;
    var lastToken = (cfg.lastTimestamp !== undefined && cfg.lastTimestamp !== null && cfg.lastTimestamp !== '') ? String(cfg.lastTimestamp) : '';
    var historyCfg = cfg.history || {};
    var maxMessages = parseInt(historyCfg.max, 10) || 100;
    var olderBatchSize = parseInt(historyCfg.olderBatch, 10) || 10;
    var loadThreshold = 25;

    var $messages = $('#quick-chat-messages');
    var $status = $('#quick-chat-status');
    var $form = $('#quick-chat-form');
    var $input = $('#quick-chat-input');
    var $send = $('#quick-chat-send');
    var $loader = $('#quick-chat-loader');
    var $display = $('#quick-chat-display');

    var loadingOlder = false;
    var historyExhausted = false;
    var canLoadOlder = true;
    var oldestToken = '';
    var totalLoaded = 0;
    var pollingDelay = 5000; // ms
    var pollingHandle = null;
    var lastOlderRequest = 0;
    var olderRequestInterval = 1000; // ms
    var displayStorageKey = 'quickChat.display';

    function setStatus(text) {
        if (!$status.length) {
            return;
        }
        $status.text(text || '');
    }

    function setScrollTop(value, smooth) {
        if (!$messages.length) {
            return;
        }
        $messages.stop(true);
        if (smooth) {
            $messages.animate({ scrollTop: value }, 180);
        } else {
            $messages.scrollTop(value);
        }
    }

    function scrollToBottom(force) {
        if (!$messages.length) {
            return;
        }
        var target = $messages[0].scrollHeight;
        var smooth = force === true ? false : true;
        setScrollTop(target, smooth);
    }

    function setDisplayValue(value)
    {
        if (!$display.length) {
            return false;
        }
        if ($display.is('select')) {
            var matched = false;
            $display.find('option').each(function () {
                if ($(this).val() === value) {
                    matched = true;
                    return false;
                }
            });
            if (matched) {
                $display.val(value);
            }
            return matched;
        }
        $display.val(value);
        return true;
    }

    function getDisplayValue()
    {
        if (!$display.length) {
            return '';
        }
        return $.trim($display.val());
    }

    function formatTime(timestamp) {
        var ts = parseFloat(timestamp);
        if (isNaN(ts)) {
            ts = 0;
        }
        var date = new Date(ts * 1000);
        var hours = date.getHours();
        var minutes = ('0' + date.getMinutes()).slice(-2);
        var suffix = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        if (hours === 0) {
            hours = 12;
        }
        hours = ('0' + hours).slice(-2);
        return hours + ':' + minutes + ' ' + suffix;
    }

    function recalcState() {
        totalLoaded = $messages.find('.quick-chat__message').length;
        var nodes = $messages.find('.quick-chat__message');
        var $first = nodes.length ? $(nodes[0]) : $();
        var $last = nodes.length ? $(nodes[nodes.length - 1]) : $();
        oldestToken = $first.length ? String($first.attr('data-ts') || '') : '';
        if ($last.length) {
            lastToken = String($last.attr('data-ts') || lastToken);
        }
        if (totalLoaded >= maxMessages) {
            historyExhausted = true;
        }
        if (!oldestToken) {
            canLoadOlder = false;
        } else {
            canLoadOlder = !historyExhausted && totalLoaded < maxMessages;
        }
    }

    function appendMessages(items) {
        if (!$messages.length || !items || !items.length) {
            return;
        }
        var added = 0;
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            var tsRaw = (typeof item.time !== 'undefined' && item.time !== null) ? String(item.time) : '';
            if (tsRaw && $messages.find('[data-ts="' + tsRaw + '"]').length) {
                continue;
            }
            var tsValue = parseFloat(tsRaw);
            if (isNaN(tsValue)) {
                tsValue = 0;
            }
            var $row = $('<div class="quick-chat__message"/>').attr('data-ts', tsRaw);
            $('<span class="quick-chat__time"/>').text('[' + formatTime(tsValue) + ']').appendTo($row);
            $('<span class="quick-chat__author"/>').text(item.author || '').appendTo($row);
            $('<span class="quick-chat__separator"/>').text(':').appendTo($row);
            $('<span class="quick-chat__body"/>').text(item.message || '').appendTo($row);
            $messages.append($row);
            added++;
        }
        if (added) {
            $messages.find('.quick-chat__empty').remove();
            recalcState();
            scrollToBottom();
        }
    }

    function prependMessages(items) {
        if (!$messages.length || !items || !items.length) {
            historyExhausted = true;
            canLoadOlder = false;
            return;
        }
        var added = 0;
        var previousHeight = $messages.length ? $messages[0].scrollHeight : 0;
        var previousScroll = $messages.scrollTop();
        var $anchor = $loader.length ? $loader : null;
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            var tsRaw = (typeof item.time !== 'undefined' && item.time !== null) ? String(item.time) : '';
            if (!tsRaw) {
                continue;
            }
            if ($messages.find('[data-ts="' + tsRaw + '"]').length) {
                continue;
            }
            var tsValue = parseFloat(tsRaw);
            if (isNaN(tsValue)) {
                tsValue = 0;
            }
            var $row = $('<div class="quick-chat__message"/>').attr('data-ts', tsRaw);
            $('<span class="quick-chat__time"/>').text('[' + formatTime(tsValue) + ']').appendTo($row);
            $('<span class="quick-chat__author"/>').text(item.author || '').appendTo($row);
            $('<span class="quick-chat__separator"/>').text(':').appendTo($row);
            $('<span class="quick-chat__body"/>').text(item.message || '').appendTo($row);
            if ($anchor && $anchor.length) {
                $row.insertAfter($anchor);
                $anchor = $row;
            } else {
                $messages.prepend($row);
                $anchor = $row;
            }
            added++;
        }
        if (added) {
            $messages.find('.quick-chat__empty').remove();
            var newHeight = $messages.length ? $messages[0].scrollHeight : previousHeight;
            setScrollTop(previousScroll + (newHeight - previousHeight), false);
            recalcState();
        } else {
            historyExhausted = true;
            canLoadOlder = false;
        }
    }

    function showLoader() {
        if (!$loader.length) {
            return;
        }
        $loader.addClass('quick-chat__loader--visible');
    }

    function hideLoader(callback) {
        if (!$loader.length) {
            if (typeof callback === 'function') {
                callback();
            }
            return;
        }
        $loader.removeClass('quick-chat__loader--visible');
        if (typeof callback === 'function') {
            callback();
        }
    }

    function buildUrl(action) {
        if (!endpoint) {
            return '';
        }
        var separator = endpoint.indexOf('?') === -1 ? '?' : '&';
        return endpoint + separator + 'action=' + encodeURIComponent(action);
    }

    function schedulePoll() {
        if (pollingHandle) {
            clearTimeout(pollingHandle);
        }
        pollingHandle = win.setTimeout(function () {
            fetchMessages({ force: true });
        }, pollingDelay);
    }

    function fetchMessages(options) {
        if (!endpoint) {
            return;
        }
        options = options || {};
        var sinceToken = (options.since !== undefined && options.since !== null) ? String(options.since) : lastToken;
        var data = {};
        if (sinceToken !== '') {
            data.since = sinceToken;
        }
        $.ajax({
            url: buildUrl('list'),
            type: 'GET',
            dataType: 'json',
            data: data,
            success: function (response) {
                if (!response || !response.success) {
                    setStatus('Connection error');
                    return;
                }
                if (response.messages && response.messages.length) {
                    appendMessages(response.messages);
                    var latest = response.messages[response.messages.length - 1].time;
                    if (typeof latest !== 'undefined' && latest !== null) {
                        lastToken = String(latest);
                    }
                }
            },
            error: function () {
                setStatus('Connection error');
            },
            complete: function () {
                schedulePoll();
            }
        });
    }

    function loadOlderMessages() {
        if (!endpoint || loadingOlder || historyExhausted || !oldestToken) {
            return;
        }
        var now = new Date().getTime();
        if (now - lastOlderRequest < olderRequestInterval) {
            return;
        }
        lastOlderRequest = now;
        loadingOlder = true;
        showLoader();
        var loadStartedAt = Date.now();
        function finishLoad(callback) {
            var elapsed = Date.now() - loadStartedAt;
            var wait = Math.max(0, olderRequestInterval - elapsed);
            win.setTimeout(function () {
                hideLoader(function () {
                    if (typeof callback === 'function') {
                        callback();
                    }
                    loadingOlder = false;
                });
            }, wait);
        }

        $.ajax({
            url: buildUrl('list'),
            type: 'GET',
            dataType: 'json',
            data: {
                before: oldestToken,
                limit: olderBatchSize
            },
            success: function (response) {
                var messages = (response && response.success && response.messages) ? response.messages : [];
                finishLoad(function () {
                    if (messages.length) {
                        prependMessages(messages);
                        if (messages.length < olderBatchSize || totalLoaded >= maxMessages) {
                            historyExhausted = true;
                            canLoadOlder = false;
                        }
                        setStatus('');
                    } else {
                        historyExhausted = true;
                        canLoadOlder = false;
                    }
                });
            },
            error: function () {
                finishLoad(function () {
                    setStatus('Không thể tải thêm tin nhắn. Vui lòng thử lại.');
                });
            }
        });
    }

    function initState() {
        if (!$messages.length) {
            $messages = $('#quick-chat-messages');
        }
        if (!$loader.length) {
            $loader = $('#quick-chat-loader');
        }
        recalcState();
        if (!$messages.length) {
            historyExhausted = true;
            canLoadOlder = false;
        }
        scrollToBottom(true); // scroll ngay khi init
    }

    initState();

    if (win && typeof win.addEventListener === 'function') {
        win.addEventListener('load', function () {
            scrollToBottom(true);
        });
    }
    if (typeof $ === 'function' && $.fn && $.fn.ready) {
        $(function () {
            scrollToBottom(true);
        });
    }

    if ($messages.length) {
        $messages.scroll(function () {
            if (!canLoadOlder || loadingOlder || historyExhausted) {
                return;
            }
            if ($messages.scrollTop() <= loadThreshold) {
                loadOlderMessages();
            }
        });
    }

    if (canPost && $form.length) {
        $form.submit(function (evt) {
            evt.preventDefault();
            evt.stopPropagation();
            var message = $.trim($input.val());
            if (!message) {
                return false;
            }
            setStatus('Sending...');
            $send.attr('disabled', 'disabled');
            var displayName = getDisplayValue();
            var payload = {
                message: message
            };
            if (displayName) {
                payload.display = displayName;
            }
            $.ajax({
                url: buildUrl('send'),
                type: 'POST',
                dataType: 'json',
                data: payload,
                success: function (response) {
                    if (response && response.success) {
                        setStatus('');
                        $input.val('');
                        if ($display.length && win.localStorage) {
                            var currentDisplay = getDisplayValue();
                            if (currentDisplay) {
                                win.localStorage.setItem(displayStorageKey, currentDisplay);
                            }
                        }
                        fetchMessages({ since: lastToken });
                    } else if (response && response.error === 'rate_limited') {
                        setStatus('Please wait before sending again.');
                    } else if (response && response.error === 'empty_message') {
                        setStatus('Message cannot be empty.');
                    } else if (response && response.error === 'not_authenticated') {
                        setStatus('You must log in to chat.');
                    } else {
                        setStatus('Message failed to send.');
                    }
                },
                error: function () {
                    setStatus('Message failed to send.');
                },
                complete: function () {
                    $send.removeAttr('disabled');
                }
            });
            return false;
        });
    }

    // Poll tin nhắn
    fetchMessages({});

    if ($display.length) {
        var defaultDisplay = cfg.displayDefault || '';
        var storedDisplay = null;
        if (win.localStorage) {
            storedDisplay = win.localStorage.getItem(displayStorageKey);
        }
        if (storedDisplay && setDisplayValue(storedDisplay)) {
            // ok
        } else if (defaultDisplay) {
            setDisplayValue(defaultDisplay);
        }
        if ($display.is('select') && win.localStorage) {
            $display.change(function () {
                var current = getDisplayValue();
                if (current) {
                    win.localStorage.setItem(displayStorageKey, current);
                }
            });
        }
    }


})(window, document, window.jQuery);
