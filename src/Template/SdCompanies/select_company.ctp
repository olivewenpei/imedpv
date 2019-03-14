<div class="card login">
    <?= $this->Form->create($sdCompany);?>
    <div class="card-body">
        <img src="/img/logo-mds.png" class="rounded mx-auto d-block mt-5" alt="G2-MDS">
        <div class="my-5 text-center">
            <p class="font-weight-bolder">Select Company</p>
            <select class="form-control" name="company_id" id="company_id" placeholder="Please select your company">
            <?php
                foreach($sdCompany as $company)
                {
                    echo "<option value=\"".$company['id']."\">".$company['company_name']."</option>";
                }
            ?>
            </select>
            <button type="submit" class="btn btn-primary"> Confirm  </button>
        </div>
    </div>
<?= $this->Form->end();?>
</div>