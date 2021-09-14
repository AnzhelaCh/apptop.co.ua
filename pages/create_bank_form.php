
<form action="/bankPhp/createBank.php" method="post" id="createBankForm">
    <input type="text" class="form-control" name="bankName" id="bankName" placeholder="Enter Bank name">

    <label for="interestRate" class="mt-3">Choose Interest rate:</label>
    <select class="form-control" name="interestRate" id="interestRate">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="50">50</option>
    </select>

    <input type="number" class="form-control mt-3" name="maxLoan" id="maxLoan" placeholder="Enter Maximum loan">
    <input type="number" class="form-control mt-3" name="minLoan" id="minLoan" placeholder="Minimum down payment" value="12">

    <label  class="mt-3" for="loanTerm">Choose Loan term:</label>
    <select class="form-control" name="loanTerm" id="loanTerm">
        <option value="12">12</option>
        <option value="24">24</option>
        <option value="36">36</option>
        <option value="60">60</option>
    </select>

    <button class="btn btn-primary mt-4" type="submit">Create</button>
</form>

<script>
    let minLoan = document.getElementById("minLoan");
    let maxLoan = document.getElementById("maxLoan");

    maxLoan.addEventListener("change",()=>{
        let maxLoanInfo = maxLoan.value;
        minLoan.innerHTML = `${maxLoanInfo*20/100}`;
        minLoan.value = `${maxLoanInfo*20/100}`;
    });
</script>