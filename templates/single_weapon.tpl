{include file="header.tpl"}



<div>
    <div class="text-center">
        <span> <b>{$weapon->weapon_name}</b></span>
        <div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                <p>Categorie of weapon: {$categorie->class}</p>
                </li>
                <li class="list-group-item">
                <p>Price: ${$weapon->price}</p>
                </li>
                <li class="list-group-item">
                <p>Damage (shots to body): {$weapon->damage}</p>
                </li>
                <li class="list-group-item">
                <p>Bullets (per magazine):{$weapon->bullets}</p>
                </li>
                <li class="list-group-item">
                <p>Effective reach (in metres): {$weapon->reach}</p>
                </li>
            </ul>
        </div>
        <a href='showAll' type='button' class='btn btn-primary'>Go back</a>
        {if (isset($smarty.session.IS_LOGGED))} 
            <a href='delete/{$weapon->id}' type='button' class='btn btn-danger'>Delete weapon</a>
            <a href='showEdit/{$weapon->id}' type='button' class='btn btn-warning'>Edit weapon</a>
        {/if}

    </div>

</div>

{include file="footer.tpl"}
