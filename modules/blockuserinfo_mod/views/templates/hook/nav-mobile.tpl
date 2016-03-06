<!-- Block user information module NAV  -->
<ul id="userinfo_mod_mobile_menu" class="mo_mu_level_0 mobile_menu_ul">
{if $is_logged}
	{if isset($sttheme.welcome_logged) && trim($sttheme.welcome_logged)}
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="{if $sttheme.welcome_link}{$sttheme.welcome_link}{else}javascript:;{/if}" rel="nofollow" class="mo_ma_level_0 {if !$sttheme.welcome_link} ma_span{/if}" title="{$sttheme.welcome_logged}">
            {$sttheme.welcome_logged}
        </a>
    </li>
    {/if}
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="nofollow" class="mo_ma_level_0" title="{l s='View my customer account' mod='blockuserinfo_mod'}">
            {if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{$cookie->customer_firstname} {$cookie->customer_lastname}
        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="nofollow" class="mo_ma_level_0" title="{l s='View my customer account' mod='blockuserinfo_mod'}">
            {l s='My Account' mod='blockuserinfo_mod'}
        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="{$link->getPageLink('index', true, NULL, 'mylogout')|escape:'html':'UTF-8'}" rel="nofollow" class="mo_ma_level_0" title="{l s='Log me out' mod='blockuserinfo_mod'}">
            {if $show_user_info_icons}<i class="icon-logout icon-large"></i>{/if}{l s='Sign out' mod='blockuserinfo_mod'}
        </a>
    </li>
{else}
	{if isset($sttheme.welcome) && trim($sttheme.welcome)}
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="{if $sttheme.welcome_link}{$sttheme.welcome_link}{else}javascript:;{/if}" rel="nofollow" class="mo_ma_level_0 {if !$sttheme.welcome_link} ma_span{/if}" title="{$sttheme.welcome}">
            {$sttheme.welcome}
        </a>
    </li>
    {/if}
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='Log in to your customer account' mod='blockuserinfo_mod'}" rel="nofollow" class="mo_ma_level_0">
            {if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{l s='Login' mod='blockuserinfo_mod'}
        </a>
    </li>
{/if}
</ul>
<!-- /Block usmodule NAV -->
