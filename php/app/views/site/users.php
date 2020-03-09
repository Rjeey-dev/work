<div class="users">
    <?php foreach ($rows as $row) { ?>
        <div><?php print $row['abonent_id']?></div>
        <div><?php print $row['number_type']?></div>
        <div><?php print $row['profile_id']?></div>
    <?php } ?>
</div>
<div class="users2">
    <?php foreach ($rows2 as $row) { ?>
        <div><?php print $row['schema_id']?></div>
        <div><?php print $row['profile_id']?></div>
        <div><?php print $row['schema_name']?></div>
    <?php } ?>
</div>