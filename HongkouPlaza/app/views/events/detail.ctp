<div class="activities_pop">
	<div class="img"><img src="/attachments/photos/event_image/<?php echo $event['Event']['image']?>" /></div>
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
	<h3><?php echo $this->Format->toDate($event['Event']['start_date'])?> - <?php echo $this->Format->toDate($event['Event']['end_date'])?></h3>
	<h2><?php echo h($event['Event']['title_sub'])?></h2>
	<p><?php echo nl2br(h($event['Event']['brief']))?></p>
</div>