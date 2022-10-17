{include file="header.tpl"}

<div class="text-center">
    <div class="row align-items-center gx-4 gy-4">
    {foreach from=$weapons item=$weapon}
            <a href='showWeapon/{$weapon->id}/{$weapon->weapon_name}' class="col">
                <span> <b>{$weapon->weapon_name}</b></span>
            </a>
    {/foreach}
    </div>


    {if (isset($smarty.session.IS_LOGGED))}
        <a href='showAdd' type='button' class='btn btn-success'>Add weapon</a>
    {/if}

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Categories
      </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href='showAll'>All</a></li>
          {foreach from=$categories item=$categorie}
            <li><a class="dropdown-item" href='filter/{$categorie->id_categorie}'>{$categorie->class}</a></li>
          {/foreach}

          {*{if (isset($smarty.session.IS_LOGGED))}*}
            <li><a class="dropdown-item" href='showCategories'>See categories</a></li>
          {*{/if}*}
        </ul>
    </div>

</div>

{include file="footer.tpl"}
