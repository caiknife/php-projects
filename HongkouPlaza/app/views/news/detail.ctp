<div class="news_pop">
	<h2><?php echo h($news['News']['title'])?></h2>
	<span class="times"><?php if($news['News']['source']):?><a href="<?php echo $news['News']['link']?>" target="_blank"><?php echo h($news['News']['source'])?></a> | <?php endif;?><?php echo $this->Format->toDate($news['News']['date'])?></span>
	<!-- JiaThis Button BEGIN -->
	<div id="ckepop">
		<span class="jiathis_txt">分享到：</span>
		<a class="jiathis_button_qzone"></a>
		<a class="jiathis_button_tsina"></a>
		<a class="jiathis_button_tqq"></a>
		<a class="jiathis_button_renren"></a>
		<a class="jiathis_button_kaixin001"></a>
	</div>
	<script type="text/javascript" src="http://v2.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
	<!-- JiaThis Button END -->
	<div class="cms">
		<?php echo $news['News']['content']?>
	</div>
</div>
