// Domain Info
var __blnDev = (location.href.indexOf("http://lc-/")==0);
var __blnBeta = (location.href.indexOf("http://new-/")==0);
var __blnLive = true;

var __strHostPreFix = "http://";
var __strHostPreFix2 = "http://";

if (__blnDev){__strHostPreFix = "http://lc-/";__blnLive = false;}
if (__blnBeta){__strHostPreFix = "http://new-/";__blnLive = false;}
if (__blnLive){__strHostPreFix2 = "https://"}

var __DOMAIN_TOP = "webzen.com";
var __DOMAIN_IMAGE = "image.webzen.com";
var __DOMAIN_PORTAL = __strHostPreFix + "www.webzen.com";
var __DOMAIN_MEMBER = __strHostPreFix + "member.webzen.com";
var __DOMAIN_FORUM = __strHostPreFix + "forum.webzen.com";
var __DOMAIN_MUONLINE = __strHostPreFix + "muonline.webzen.com";
var __DOMAIN_ARCHLORD = __strHostPreFix + "archlord.webzen.com";
var __DOMAIN_SUNONLINE = __strHostPreFix + "sunonline.webzen.com";
var __DOMAIN_UPLOAD = __strHostPreFix + "upload.webzen.com";
var __DOMAIN_FILES = __strHostPreFix + "files.webzen.com";
var __DOMAIN_ITEMSHOP = __strHostPreFix + "itemshop.muonline.webzen.com";
var __DOMAIN_PAYMENT = __strHostPreFix + "payment.webzen.com";

// Message Info
var TEXT11 = "Please enter a vaild user ID.";
var TEXT12 = "The user ID must be a combination of alphabetic characters and numbers.";
var TEXT13 = "The user ID must consist of minimum 4 and maximum 20 characters.";
var TEXT14 = "The user ID cannot only contain numbers.";
var TEXT15 = "You have entered a filtered/blocked user ID string.";
var TEXT16 = "Please enter a valid password.";
var TEXT17 = "The password may only contain characters or numbers.";
var TEXT18 = "We recommended that you use a combination of alphabetic characters and numbers.";
var TEXT19 = "The password must consist of minimum 6 and maximum 20 characters.";
var TEXT20 = "Using 4 consecutive entries of letters or numbers are restricted. (ie.. 1,2,3,4 : ABCD)";
var TEXT21 = "Using 4 consecutive entries of the same characters are restricted. (ie.. 1111 : AAAA)";
var TEXT22 = "You cannot use the password which has at least 4 duplicate character string from the user ID.";
var TEXT27 = "The user ID and password must be differ.";
var TEXT29 = "You can cancel your account termination.";
var TEXT30 = "You have terminated your Webzen account. You may re-sign up within 90 days from the termination date.";
var TEXT31 = "You have terminated your Webzen account.";
var TEXT32 = "You have entered an invalid information or your account doesn't exist. Please try again.";
var TEXT33 = "Illegal access.";
var TEXT34 = "Five (5) failed login attempts. Your account is temporarily disabled, and you must wait at least 10 minutes before you try again. Please ensure that you have entered the correct user ID and password. If the problem continues, contact us at global_admin@webzen.com.";
var TEXT35 = "Unable to login to our website. IP address restrictions may be applied.";
var TEXT37 = "Unexpected error has occurred please try again.";
var TEXT49 = "failed login.Please try again."
var TEXT51 = "It is a situation of user ID limitation";
var TEXT61 = "Please enter Character name.";
var TEXT62 = "Please enter Guild name.";


// Page Info
var arrMenu = new Array();

arrMenu[0] = new Array();
arrMenu[0][0] = { Seq: 0, Text: MENU00, link: "/" };

// News
arrMenu[1] = new Array();
arrMenu[1][0] = { Seq: 10, Text: MENU10, link: "/News/Notice/" };
arrMenu[1][1] = { Seq: 11, Text: MENU11, link: "/News/Notice/" };
arrMenu[1][2] = { Seq: 12, Text: MENU12, link: "/News/Event/" };

// Media
arrMenu[3] = new Array();
arrMenu[3][0] = { Seq: 30, Text: MENU30, link: "/Media/ScreenShot/" };
arrMenu[3][1] = { Seq: 31, Text: MENU31, link: "/Media/ScreenShot/" };
arrMenu[3][2] = { Seq: 32, Text: MENU32, link: "/Media/Movie/" };
arrMenu[3][3] = { Seq: 33, Text: MENU33, link: "/Media/WallPaper/" };
arrMenu[3][4] = { Seq: 34, Text: MENU34, link: "/Media/ConceptArt/" };

// DownLoad
arrMenu[4] = new Array();
arrMenu[4][0] = { Seq: 40, Text: MENU40, link: __DOMAIN_PORTAL + "/_HTML/Download.aspx" };
arrMenu[4][1] = { Seq: 41, Text: MENU41, link: __DOMAIN_PORTAL + "/_HTML/Download.aspx" };

// Etc
arrMenu[5] = new Array();
arrMenu[5][0] = { Seq: 50, Text: MENU50, link: "" };
arrMenu[5][1] = { Seq: 51, Text: MENU51, link: "" };
arrMenu[5][2] = { Seq: 52, Text: MENU52, link: "" };
arrMenu[5][3] = { Seq: 53, Text: MENU53, link: "" };
arrMenu[5][4] = { Seq: 54, Text: MENU54, link: "" };
arrMenu[5][5] = { Seq: 55, Text: MENU55, link: "/_HTML/ActivexInstall.aspx" };

// Forum
arrMenu[6] = new Array();
arrMenu[6][0] = { Seq: 60, Text: MENU60, link: __DOMAIN_FORUM + "/VideoForum/" };
arrMenu[6][1] = { Seq: 61, Text: MENU61, link: __DOMAIN_FORUM + "/VideoForum/" };
arrMenu[6][2] = { Seq: 62, Text: MENU62, link: __DOMAIN_FORUM + "/forum64-continent-of-mu.aspx" };
arrMenu[6][3] = { Seq: 62, Text: MENU63, link: "/Community/FanSite/" };

// Shop
arrMenu[7] = new Array();
arrMenu[7][0] = { Seq: 70, Text: MENU70, link: __DOMAIN_ITEMSHOP + "/Main/Main_Mu.asp" };
arrMenu[7][1] = { Seq: 71, Text: MENU71, link: __DOMAIN_ITEMSHOP + "/Main/Main_Mu.asp" };
arrMenu[7][2] = { Seq: 72, Text: MENU72, link: __DOMAIN_ITEMSHOP + "/Main/Main_Mu.asp?AccessUrl=/Guide/ItemShopGuideFrm.asp" };
arrMenu[7][3] = { Seq: 73, Text: MENU73, link: __DOMAIN_PAYMENT + "/Main/Main_GB_C.asp" };

// Ranking
arrMenu[8] = new Array();
arrMenu[8][0] = { Seq: 80, Text: MENU80, link: "/Ranking/" };
arrMenu[8][1] = { Seq: 81, Text: MENU81, link: "/Ranking/Default.aspx" };
arrMenu[8][2] = { Seq: 82, Text: MENU82, link: "/Ranking/EventMap.aspx" };
arrMenu[8][3] = { Seq: 83, Text: MENU83, link: "/Ranking/Guild.aspx" };
arrMenu[8][4] = { Seq: 84, Text: MENU84, link: "/Ranking/Pvp.aspx" };
arrMenu[8][5] = { Seq: 85, Text: MENU85, link: "/Ranking/CastleSiege.aspx" };


var _naviLoginSts = false;
function setNavLoginSts(blnSts)
{
	_naviLoginSts = blnSts;
}

function getNavLoginSts()
{
	return _naviLoginSts;
}

// Page Move
function fnGoMenu(intDepth1, intDepth2)
{
	//Hide Menu
	if (arrMenu[intDepth1][intDepth2].Seq == 32 || arrMenu[intDepth1][intDepth2].Seq == 82)
	{
		alert("Service will be available soon.");
		return;
	}

	var strLink = "/default.aspx";

	try
	{
		if(typeof(arrMenu[intDepth1][intDepth2].length) == "undefined")
		{
			for(var intLoop=0; intLoop < arrMenu[intDepth1].length; intLoop++ )
			{
				if(intLoop == intDepth2)
				{
					if(getNavLoginSts())
				    {
				        //BUY W COIN
					    if(intDepth1 == 7 && intLoop == 3)
				        {
					        document.location.href = __DOMAIN_PAYMENT + "/Main/Main_GB_C.asp";
					        break;
					    }
					    else
					    {
					        strLink = arrMenu[intDepth1][intLoop].link;
					        document.location.href = strLink;
					        break;
			            }
			        }
			        else
			        {
			            //BUY W COIN
					    if(intDepth1 == 7 && intLoop == 3)
				        {
					        document.location.href = __DOMAIN_MEMBER + "/Login/default.aspx?sGC=102&sRU=" + __DOMAIN_PAYMENT + "/Main/Main_GB_C.asp";
					        break;
					    }
					    else
					    {
					        strLink = arrMenu[intDepth1][intLoop].link;
					        document.location.href = strLink;
					        break;
			            }
			        }
				}
			}
		}
		else
		{
			var strMenu = String(intDepth2);
			var sMmenu = strMenu.substring(0,1);
			var sSmenu = strMenu.substring(1,2);

			for(var intLoop=0; intLoop < arrMenu[intDepth1][intDepth2].length; intLoop++ )
			{
				if(intLoop == sSmenu)
				{
					strLink = arrMenu[intDepth1][[intDepth2]][intLoop].link;
					document.location.href = strLink;
					break;
				}
			}
		}
	}
	catch(e){
		document.location.href = strLink;
	}
}

// Left Menu Layer
var snbLayerTempIdx = "";
function snb_layer(strmenu,idx){
	var obj = document.getElementById("guide_" + idx);

	if(strmenu.className == "off"){
		strmenu.className = "on";
		obj.style.display="block";
	} else {
		strmenu.className = "off";
		obj.style.display = "none";
	}

	if(snbLayerTempIdx != ""){
		if(snbLayerTempIdx != idx){
			var objLayerTemp = document.getElementById("snb_" + snbLayerTempIdx)
			var objSnbTemp = document.getElementById("guide_" + snbLayerTempIdx)
			objLayerTemp.className = "off";
			objSnbTemp.style.display = "none";
		}
	}

	snbLayerTempIdx = idx;
}

// Left Menu
function printLeftMenu(intDepth1, intDepth2, intDepth3)
{
	var strCssName = "";
	var strSubCssName = "";
	var strDisplay = "";
	
	document.write("<div class=\"snb_wrap\">")
	document.write("<h2><span class=\"icon\">" + arrMenu[intDepth1][0].Text + "</span></h2>")
	document.write("<ul class=\"snb_1dep\">")

	for(var intLoop=1; intLoop < arrMenu[intDepth1].length; intLoop++)
	{
		//Hide Menu
		if (arrMenu[intDepth1][intLoop].Seq == 32 || arrMenu[intDepth1][intLoop].Seq == 82)
		{
			continue;
		}

		snbLayerTempIdx = intDepth2;
		strCssName = intDepth2 == intLoop ? "on" : "off";

		if(intDepth1 == 2) // Guides
		{
			//Hide Menu
			if(arrMenu[intDepth1][intLoop][0].Seq == 250 || arrMenu[intDepth1][intLoop][0].Seq == 260)
			{
				continue;
			}
			strDisplay = intDepth2 == intLoop ? "block" : "none";

			document.write("<li class=\"d3_mnu\">");
			document.write("<h3><a href=\"/GameGuide/\" onclick=\"snb_layer(this,"+intLoop+"); return false;\" id=\"snb_"+intLoop+"\" class=\""+strCssName+"\">"+arrMenu[intDepth1][intLoop][0].Text+"</a></h3>");
			document.write("<ul id=\"guide_"+intLoop+"\" style=\"display:"+strDisplay+"\">");

			for(var intLoopB=1; intLoopB < arrMenu[intDepth1][intLoop].length; intLoopB++)
			{
				//Hide Menu
				if(arrMenu[intDepth1][intLoop][intLoopB].Seq == 213)
				{
					continue;
				}
				strSubCssName = intDepth2 == intLoop && intDepth3 == intLoopB ? "m_on" : "m_off"

				document.write("<li class=\"m_"+intLoopB+"\"><a href=\""+arrMenu[intDepth1][intLoop][intLoopB].link+"\" class=\""+strSubCssName+"\">- "+arrMenu[intDepth1][intLoop][intLoopB].Text+"</a></li>");
			}

			document.write("</ul>");
			document.write("</li>");
		}
		else
		{
		    //로그인 되어 있을 때

		    if(getNavLoginSts())
			{
		        document.write("<li class=\"d2_mnu\"><a href=\""+arrMenu[intDepth1][intLoop].link+"\" class=\""+strCssName+"\">"+arrMenu[intDepth1][intLoop].Text+"</a></li>")
	        }
	        else
	        {
	            //BUY W COIN
			    if(intDepth1 == 7 && intLoop == 3)
		        {
		            document.write("<li class=\"d2_mnu\"><a href=\""+__DOMAIN_MEMBER + "/Login/default.aspx?sGC=102&sRU=" + arrMenu[intDepth1][intLoop].link+"\" class=\""+strCssName+"\">"+arrMenu[intDepth1][intLoop].Text+"</a></li>")
	            }
	            else
	            {
	                document.write("<li class=\"d2_mnu\"><a href=\""+arrMenu[intDepth1][intLoop].link+"\" class=\""+strCssName+"\">"+arrMenu[intDepth1][intLoop].Text+"</a></li>")
	            }
	        }
		}
	}

	document.write("</ul>")
	document.write("</div>")
}

// Page Navi
function printHistory(intDepth1, intDepth2, intDepth3)
{
	var strMenu = String(intDepth2);
	var sMmenu = strMenu.substring(0,1);
	var sSmenu = strMenu.substring(1,2);
	var strTitle = "";

	document.write("<div class=\"locationtitle\">")
	document.write("<div class=\"location\">")
	document.write("<a href=\"/\" class=\"home\">" + arrMenu[0][0].Text + "</a>")

	if(intDepth2 == 0)
	{
		strTitle = arrMenu[intDepth1][intDepth2].Text;
		document.write(" &gt; <strong>" + arrMenu[intDepth1][0].Text + "</strong>")
	}
	else if(intDepth1 == 2) // Guides
	{
		strTitle = arrMenu[intDepth1][intDepth2][intDepth3].Text;
		document.write(" &gt; <a href=\""+arrMenu[intDepth1][0].link+"\" class=\"home\">" + arrMenu[intDepth1][0].Text + "</a>")
		document.write(" &gt; <a href=\""+arrMenu[intDepth1][intDepth2][0].link+"\" class=\"home\">" + arrMenu[intDepth1][intDepth2][0].Text + "</a>")
		document.write(" &gt; <strong>"+ arrMenu[intDepth1][intDepth2][intDepth3].Text + "</strong>")
	}
	else
	{
		strTitle = arrMenu[intDepth1][intDepth2].Text;
		document.write(" &gt; <a href=\""+arrMenu[intDepth1][0].link+"\" class=\"home\">" + arrMenu[intDepth1][0].Text + "</a>")
		document.write(" &gt; <strong>"+ arrMenu[intDepth1][intDepth2].Text + "</strong>")
	}

	document.write("</div>")
	document.write("<h3 class=\"subtitle\">" + strTitle + "</h3>")
	document.write("</div>")
}

// Footer
function printFooter()
{
	document.write("<div id=\"footer\">")
	document.write("	<address>")
	document.write("		WEBZEN Inc. Global Digital Entertainment Leader.")
	document.write("		Copyright  WEBZEN, INC. All Right Reserved.")
	document.write("	</address>")
	document.write("	<ul>")
	document.write("		<li><a href=\"http://company.webzen.com/eng/\" target=\"_blank\" class=\"aboutcompany\">ABOUT COMPANY</a></li>")
	document.write("		<li><a href=\""+__DOMAIN_PORTAL+"/_HTML/PrivacyPolicy.aspx\" class=\"privacypolicy\">PRIVACY POLICY</a></li>")
	document.write("		<li><a href=\""+__DOMAIN_PORTAL+"/_HTML/TermsOfService.aspx\" class=\"termsofservice\">TERMS OF SERVICE</a></li>")
	document.write("		<!--li><a href=\""+__DOMAIN_PORTAL+"/_HTML/ContactUs.aspx\" class=\"contactus\">CONTACT US</a></li-->")
	document.write("	</ul>")
	document.write("</div>")
}

// Page Move Forum
function fnGoForum()
{
	var strLink = __DOMAIN_FORUM + "/default.aspx";

	document.location.href = strLink;
}

// Page Move DownLoad
function fnGoDownLoad() {
	var strLink = __DOMAIN_PORTAL + "/_HTML/Download.aspx";

	document.location.href = strLink;
}