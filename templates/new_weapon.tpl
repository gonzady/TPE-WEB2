{include 'header.tpl'}

<div class="mt-5 w-25 mx-auto">
    <form method="POST" action="add">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" required class="form-control" id="weapon_name" name="weapon_name" aria-describedby="weaponsName">
        </div>
        <select id="id_categorie" name="id_categorie" class="form-select form-select-sm" aria-label="Default select example">
        <option selected>Categories</option>
        {foreach from=$categories item=$categorie}
            <option value="{$categorie->id_categorie}">{$categorie->class}</option>
        {/foreach}
        </select>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" required class="form-control" id="price" name="price">
        </div>
        <div class="form-group">
            <label for="damage">Damage</label>
            <input type="number" required class="form-control" id="damage" name="damage">
        </div>
        <div class="form-group">
            <label for="bullets">Bullets</label>
            <input type="number" required class="form-control" id="bullets" name="bullets">
        </div>
        <div class="form-group">
            <label for="range">Range</label>
            <input type="number" required class="form-control" id="reach" name="reach">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add weapon</button>
    </form>
</div>

{include file='footer.tpl'}
