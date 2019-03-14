<?= $this->Form->create($sdCompany);?>
<select class="form-control" name="company_id" id="company_id">
<?php 
    foreach($sdCompany as $company)
    {
        echo "<option value=\"".$company['id']."\">".$company['company_name']."</option>";
    }
?>
</select>
<button type="submit">confirm</button>
<?= $this->Form->end();?>