{include file="header.tpl"}

<div class="text-center">
    <div class="row align-items-center gx-4 gy-4">
    <p>List of weapon categories</p>
    {if (isset($smarty.session.IS_LOGGED))}<p>Warning: eliminate a categorie will also eliminate weapons with such categorie</p>{/if}
    {foreach from=$categories item=$categorie}
                <span> <b>{$categorie->class}</b></span>
                {if (isset($smarty.session.IS_LOGGED))}
                <form method="POST" action="editCategorie/{$categorie->id_categorie}">
                    <div class="form-group">
                        <label for="class">Edit categorie name</label>
                        <input type="text" required class="form-control" id="class" name="class">
                    </div> 
                    <button type="submit" class="btn btn-warning mt-3">Edit categorie</button>
                </form>
                <form method="POST" action="deleteCategorie/{$categorie->id_categorie}">
                    <div class="form-group">
                    </div> 
                <button type="submit" class="btn btn-danger mt-3">Delete categorie</button>
                </form>
                {/if}
    {/foreach}
    </div>
</div>

{if (isset($smarty.session.IS_LOGGED))}
<div>
    <form method="POST" action="addCategorie">
        <div class="form-group">
            <label for="class">New categorie</label>
            <input type="text" required class="form-control" id="class" name="class">
        </div> 
        <button type="submit" class="btn btn-primary mt-3">Add categorie</button>
        {if $error}
            <div class="alert alert-danger mt-3">
            {$error}
            </div>
        {/if}
    </form>
</div>
{/if}
<a href='showAll' type='button' class='btn btn-primary'>Go back</a>
{include file="footer.tpl"}