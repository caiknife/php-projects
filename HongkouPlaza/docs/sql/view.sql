DROP VIEW IF EXISTS view_mb;
CREATE VIEW view_mb AS (SELECT member_id, COUNT(1) AS total FROM member_brand GROUP BY member_id);

DROP VIEW IF EXISTS view_users;
CREATE VIEW view_users AS (SELECT members.*, view_mb.total FROM members LEFT JOIN view_mb ON members.id=view_mb.member_id);

ALTER TABLE `brands` 
   ADD COLUMN `pinyin` varchar(10) NULL after `title`;