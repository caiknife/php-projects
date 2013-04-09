alter table `yanran_fund`.`topics` 
   add column `title` varchar(255) NULL after `en_banner_file_size`, 
   add column `desc` text NULL after `title`, 
   add column `banner_file_path` varchar(255) NULL after `desc`, 
   add column `banner_file_size` varchar(255) NULL after `banner_file_path`, 
   add column `lang` varchar(10) DEFAULT 'cn' NULL after `banner_file_size`;
   
UPDATE topics SET 
title=title_cn, 
`desc`=desc_cn,
banner_file_path=cn_banner_file_path,
banner_file_size=cn_banner_file_size,
lang='cn';
   
alter table `yanran_fund`.`topics` drop column `title_cn`, drop column `title_en`, drop column `en_banner_file_size`, drop column `cn_banner_file_size`, drop column `en_banner_file_path`, drop column `cn_banner_file_path`, drop column `desc_en`, drop column `desc_cn`;
   