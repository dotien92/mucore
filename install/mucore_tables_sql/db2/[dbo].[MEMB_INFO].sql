IF COL_LENGTH('MEMB_INFO', 'TVote') IS NULL
BEGIN
        ALTER TABLE MEMB_INFO
        ADD TVote INT not null default 0
END
GO