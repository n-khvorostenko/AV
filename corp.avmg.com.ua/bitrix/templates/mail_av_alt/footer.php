<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 20px;margin: 0">
                        <p style=
                                   "
									background-color: #CC0000;
									padding: 0;
									margin: 0 auto;
									height: 2px;
									"
                        ></p>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 88%;padding: 20px;margin: 0">
                        <p
                                class="av-mail-footer-left-block"
                                style="padding: 0;margin: 0;text-align: center"
                        >
                            <?EventMessageThemeCompiler::includeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/bitrix/templates/mail_av_alt/include/info.php'))?>
                        </p>
                        <p
                                class="av-mail-footer-right-block"
                                style="padding: 0;margin: 20px 0 0 0;text-align: center"
                        >
                            <br>
                            <b style="display: block;margin-top: 10px">
                                <?EventMessageThemeCompiler::includeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/bitrix/templates/mail_av/include/feadback.php'))?>
                            </b>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>