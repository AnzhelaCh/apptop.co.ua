<?php
$id =$_GET['id'];
if(!empty($data)){
    ?>
    <form action="action_edit?id=<?php echo $id ?>" method="post" class="col-6 listWrapper list-group d-flex flex-column">
        <?php

        foreach ($data as $value) {

            if($value["id"] == $id){
                ?>
                <input type="text" class="form-control mt-3" name="bankName" id="bankName" placeholder="<?php echo $value["bankName"] ?>">
                <input type="number" class="form-control mt-3" name="interestRate" id="interestRate" placeholder="<?php echo $value["interestRate"] ?>">
                <input type="number" class="form-control mt-3" name="maxLoan" id="maxLoanEdit" placeholder="<?php echo $value["maxLoan"] ?>">
                <input type="number" class="form-control mt-3" name="minLoan" id="minLoanEdit" placeholder="<?php echo $value["minLoan"] ?>">
                <label  class="mt-3" for="loanTerm">Choose Loan term:</label>
                <select class="form-control" name="loanTerm" id="loanTermEdit">
                    <option value="12">12</option>
                    <option value="24">24</option>
                    <option value="36">36</option>
                    <option value="60">60</option>
                </select>
                <?php
            }
            ?>

            <?php

        }
        ?>
        <button class="btn btn-success mt-2" type="submit">Save</button>
    </form>
    <?php
}
?>

<script>
    let minLoanEdit = document.getElementById("minLoanEdit");
    let maxLoanEdit = document.getElementById("maxLoanEdit");
    maxLoanEdit.addEventListener("change",()=>{
        let maxLoanInfo = maxLoanEdit.value;
        minLoanEdit.innerHTML = `${maxLoanInfo*20/100}`;
        minLoanEdit.value = `${maxLoanInfo*20/100}`;

        minLoanEdit.setAttribute('value', `${maxLoanInfo*20/100}`);
    });
</script>