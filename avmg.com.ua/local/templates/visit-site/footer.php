				<?if($workAreaType == 'left_menu_page'):?>
				</div>
				<?endif?>
			<?if($workAreaType != 'full_screen_page'):?>
			</div>
			<?endif?>
		</div>
		<?
		/* ------------------------------------------- */
		/* ------------------ footer ----------------- */
		/* ------------------------------------------- */
		?>
		<footer>
			<div class="container">
				<div class="col-lg-10 col-md-10 hidden-sm hidden-xs">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av_vs_bottom",
							array(
							"ROOT_MENU_TYPE"     => 'top',
							"MAX_LEVEL"          => 2,
							"CHILD_MENU_TYPE"    => 'bottom',
							"USE_EXT"            => 'Y',
							"DELAY"              => 'N',
							"ALLOW_MULTI_SELECT" => 'N',

							"MENU_CACHE_TYPE"       => 'A',
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => 'Y'
							)
						)
					?>
				</div>

				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 contacts-cell">
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/contacts_footer.php'))?>
				</div>

				<div class="hidden-lg hidden-md col-sm-6 col-xs-12 subscibe-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:sender.subscribe", "av", 
							array(
							"USE_PERSONALIZATION" => 'Y',
							"CONFIRMATION"        => 'N',
							"SHOW_HIDDEN"         => 'N',
							"SET_TITLE"           => 'N',

							"AJAX_MODE"           => 'Y',
							"AJAX_OPTION_JUMP"    => 'Y',
							"AJAX_OPTION_STYLE"   => 'N',
							"AJAX_OPTION_HISTORY" => 'N',

							"CACHE_TYPE" => 'A',
							"CACHE_TIME" => 360000
							)
						);
					?>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 socservs-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:eshop.socnet.links", "av",
							array(
							"FACEBOOK"  => 'https://www.facebook.com/avmg.com.ua/',
							"GOOGLE"    => 'https://plus.google.com/u/2/114220723367013333669',
							"TWITTER"   => 'https://twitter.com/avmgua',
							"VKONTAKTE" => 'https://vk.com/avmgua'
							)
						);
					?>

					<div class="hidden-sm hidden-xs">
						<?
						$APPLICATION->IncludeComponent
							(
							"bitrix:sender.subscribe", "av-line", 
								array(
								"USE_PERSONALIZATION" => 'Y',
								"CONFIRMATION"        => 'N',
								"SHOW_HIDDEN"         => 'N',
								"SET_TITLE"           => 'N',

								"AJAX_MODE"           => 'Y',
								"AJAX_OPTION_JUMP"    => 'Y',
								"AJAX_OPTION_STYLE"   => 'N',
								"AJAX_OPTION_HISTORY" => 'N',

								"CACHE_TYPE" => 'A',
								"CACHE_TIME" => 360000
								)
							);
						?>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 copyright-cell">
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/copyright_footer.php'))?>
				</div>
			</div>
		</footer>
		<?
		/* ------------------------------------------- */
		/* ---------------- additional --------------- */
		/* ------------------------------------------- */
		?>
		<div id="av-vst-up-button"></div>
		<script data-skip-moving="true">
		(function(w,d,u,b)
			{
			s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;
			h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
			})(window,document,'https://corp.avmg.com.ua/upload/crm/site_button/loader_4_iin5is.js');
		</script>
		<script data-skip-moving="true">
		(function(w,d,u,b)
			{
			s=d.createElement('script');r=(Date.now()/1000|0);s.async=1;s.src=u+'?'+r;
			h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
			})(window,document,'https://corp.avmg.com.ua/upload/crm/site_button/loader_5_e1wuoj.js');
		</script>
	</body>
</html>