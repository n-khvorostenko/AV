	<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?
	$APPLICATION->SetAdditionalCss($templateFolder."/slick.css");
	$APPLICATION->AddHeadScript($templateFolder."/slick.min.js");
	if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog"):
		$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
		$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/red2/style.css');
	endif;
	?>
	<?CUtil::InitJSCore(array("image"));?>
<div id="blog-posts-content-same-section" class="col-md-12">


<?
	if (!empty($arResult["OK_MESSAGE"])) {
		?>
		<div class="blog-notes blog-note-box">
			<div class="blog-note-text">
				<ul>
					<?
					foreach ($arResult["OK_MESSAGE"] as $v) {
						?>
						<li><?= $v ?></li>
						<?
					}
					?>
				</ul>
			</div>
		</div>
		<?
	}
	if (!empty($arResult["MESSAGE"])) {
		?>
		<div class="blog-textinfo blog-note-box">
			<div class="blog-textinfo-text">
				<ul>
					<?
					foreach ($arResult["MESSAGE"] as $v) {
						?>
						<li><?= $v ?></li>
						<?
					}
					?>
				</ul>
			</div>
		</div>
		<?
	}
	if (!empty($arResult["ERROR_MESSAGE"])) {
		?>
		<div class="blog-errors blog-note-box blog-note-error">
			<div class="blog-error-text">
				<ul>
					<?
					foreach ($arResult["ERROR_MESSAGE"] as $v) {
						?>
						<li><?= $v ?></li>
						<?
					}
					?>
				</ul>
			</div>
		</div>
		<?
	}

	if (count($arResult["POST"]) > 1 )
	{ ?>
	<div class=" text-center">
		<span id="same-post-title" class="text-uppercase"><b>похожие статьи<b></span>
		<p>			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"PATH" => "/include/blog/same-post-text.php"
				)
			);?></p></div>
	<script>
		BX.viewImageBind(
			'blg-post-<?=$CurPost["ID"]?>',
			{showTitle: false},
			{tag: 'IMG', attr: 'data-bx-image'}
		);
	</script>
	<div class=" text-center" id="same-section-post-wrap">

		<?
		for($i = 0;$i < 4;$i++) {
			$ind = $i;
			$CurPost = $arResult["POST"][$i];
			if ($CurPost["ID"] != $GLOBALS['CATEGORY_POST_ID']) {

				if ($CurPost["ID"] != $GLOBALS['CATEGORY_POST_ID'] && $ind < 4) {
					$className = "blog-post col-md-3";
					if ($ind == 0)
						$className .= " blog-post-first";
					elseif (($ind + 1) == count($arResult["POST"]))
						$className .= " blog-post-last";
					if ($ind % 2 == 0)
						$className .= " blog-post-alt";
					$className .= " blog-post-year-" . $CurPost["DATE_PUBLISH_Y"];
					$className .= " blog-post-month-" . IntVal($CurPost["DATE_PUBLISH_M"]);
					$className .= " blog-post-day-" . IntVal($CurPost["DATE_PUBLISH_D"]);
					?>
					<div class="<?= $className ?>" id="blg-post-<?= $CurPost["ID"] ?>">
						<div class="blog-post-content-wrap">
							<a class="same-post-link" href="<?='/blog/'.$arResult["BLOG"]["URL"].'/'.$CurPost["CODE"].'/'?>" title="<?=$CurPost["TITLE"]?>">

							</a>
							<a href="<?='/blog/'.$arResult["BLOG"]["URL"].'/'.$CurPost["CODE"].'/'?>" title="<?=$CurPost["TITLE"]?>">
						<h2 class="blog-post-title text-center text-uppercase"><?= $CurPost["TITLE"] ?></h2>
							</a>
						<div class="blog-post-content-same-post">

							<?= $CurPost["TEXT_FORMATED"] ?>
							<?
							if ($CurPost["CUT"] == "Y") {
								?><p><a class="blog-postmore-link"
										href="<?= $CurPost["urlToPost"] ?>"><?= GetMessage("BLOG_BLOG_BLOG_MORE") ?></a>
								</p><?
							}
							?>
							<? if (!empty($CurPost["arImages"])) {
								?>
								<div class="feed-com-files">
									<div class="feed-com-files-title"><?= GetMessage("BLOG_PHOTO") ?></div>
									<div class="feed-com-files-cont">
										<?
										foreach ($CurPost["arImages"] as $val) {
											?><span class="feed-com-files-photo"><img src="<?= $val["small"] ?>" alt=""
																					  border="0"
																					  data-bx-image="<?= $val["full"] ?>">
											</span><?
										}
										?>
									</div>
								</div>
								<?
							} ?>
						</div>
						</div>


					</div>
					<?
				}
				if (strlen($arResult["NAV_STRING"]) > 0)
					echo $arResult["NAV_STRING"];
			}

		}}		elseif (!empty($arResult["BLOG"]))


	?>
	</div>