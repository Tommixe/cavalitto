<!-- MODULE st banner -->
{if isset($groups)}
    {foreach $groups as $group}
        {if $group.is_full_width}<div id="banner_container_{$group.id_st_banner_group}" class="banner_container full_container {if $group['hide_on_mobile']} hidden-xs {/if} block">{if !$group.stretched}<div class="container">{/if}{/if}
            <div id="st_banner_{$group.id_st_banner_group}" class="st_banner_row {if !$group.is_full_width} block {/if} {if $group['hide_on_mobile']} hidden-xs {/if}{if $group['hover_effect']} hover_effect_{$group['hover_effect']} {/if} {if isset($group.is_column) && $group.is_column} column_block {/if}">
                {if isset($group['banners']) && count($group['banners'])}
                    <div class="row block_content">
                        <div id="banner_box_{$group['id_st_banner_group']}" class="col-sm-12 banner_col" data-height="100">
                            {include file="./stbanner-block.tpl" banner_data=$group['banners'][0] banner_height=$group['height']}
                        </div>
                    </div>
                {elseif isset($group['columns'])}
                    {include file="./stbanner-column.tpl" columns_data=$group['columns']}
                {/if}
            </div>
        {if $group.is_full_width}</div>{if !$group.stretched}</div>{/if}{/if}
    {/foreach}
{/if}
<!--/ MODULE st banner -->