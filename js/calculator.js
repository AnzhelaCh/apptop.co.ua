function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
let userBanksCookie =getCookie('userBanks');

    let userBanksCookieData = userBanksCookie.split(",");

    let userBanksCookieDataArray = [];
    let userBanksCookieDataClear = [];
    let userBanksCookieDataArrayList = [];

    userBanksCookieData.forEach(el=>{
        let item = el.replace(/[^a-zA-Z0-9:]/g, '');
        userBanksCookieDataArray.push(item);
    });

    userBanksCookieDataArray.forEach(item=>{
        let a = item.split(':')[1];
        userBanksCookieDataClear.push(a);
    });

    while (userBanksCookieDataClear.length > 0){
        userBanksCookieDataArrayList.push(userBanksCookieDataClear.splice(0, 7));
    }

    if(document.querySelector(".calculatorWrapper")){

        if(!userBanksCookie){
            let getCalculatorWrapper = document.querySelector(".calculatorWrapper h2");
            let createMessage = document.createElement("h3");
            createMessage.innerHTML = `You don't have any banks! Please,create!<br><a href="createBank">Go to create Bank</a>`;
            getCalculatorWrapper.append(createMessage);
        }else {
            let calculatorContent  = document.createElement("div");

            calculatorContent.className = "calcContent";
            let calculatorWrapper = document.querySelector(".calculatorWrapper");

            calculatorWrapper.append(calculatorContent);


            let bankNameSelect = document.createElement("SELECT");
            bankNameSelect.className = "form-select";
            bankNameSelect.setAttribute("id", "bankNameSelect");
            calculatorContent.appendChild(bankNameSelect);

            let bankNameOption = document.createElement("option");
            bankNameOption.setAttribute("value", `-`);

            let element = document.createTextNode(`Choice bank name`);
            bankNameOption.appendChild(element);

            bankNameSelect.appendChild(bankNameOption);
            if(userBanksCookieDataArrayList.length > 0){
                for(let i =0; i < userBanksCookieDataArrayList.length;i++){

                    let bankNameOption = document.createElement("option");
                    bankNameOption.setAttribute("value", `${userBanksCookieDataArrayList[i][2]}`);

                    let element = document.createTextNode(`${userBanksCookieDataArrayList[i][2]}`);
                    bankNameOption.appendChild(element);

                    bankNameSelect.appendChild(bankNameOption);

                }

            }

            bankNameSelect.addEventListener("change", ()=>{
                if(document.getElementById('content')){
                    document.getElementById('content').remove();
                }

                if(document.querySelector('#tableCalc')){
                    document.querySelector('#tableCalc').remove();
                }
                if(document.querySelector('#monthlyButton')){
                    document.querySelector('#monthlyButton').remove();
                }

                let payPerMonth = "";
                let monthlyButton = document.createElement("button");
                monthlyButton.innerHTML = "Show table";
                monthlyButton.className = "btn btn-primary mt-4";
                monthlyButton.id = "monthlyButton";

                let content = document.createElement("div");
                content.className = "content";
                content.id = "content";
                let maxL = document.createElement('input');
                let maxLContent = document.createElement('div');
                maxLContent.className = "maxLContent";
                let resultmaxL = document.createElement('span');
                resultmaxL.id = "resultmaxL";
                let minL = document.createElement('div');
                let loanTerm = document.createElement('div');
                loanTerm.className = "loanTerm";
                let monthPayment =document.createElement('div');

                content.innerHTML = "";

                for(let i =0; i < userBanksCookieDataArrayList.length;i++){
                    if(userBanksCookieDataArrayList[i].includes(bankNameSelect.value)){
                        content.innerHTML = `
                <p class="form-control mt-3">Interest Rate: ${userBanksCookieDataArrayList[i][3]}%</p>
                <label for="maxL">Choice max loan</label>
                `;

                        maxL.id = "maxL";
                        maxL.type = "range";
                        maxL.name = "maxL";
                        maxL.min = "1000";
                        maxL.max = `${userBanksCookieDataArrayList[i][4]}`;

                        loanTerm.innerHTML = `<span class="form-control mt-3">Loan Term: ${userBanksCookieDataArrayList[i][6]}</span>`;



                        calculatorContent.append(content);
                        content.append(maxLContent);
                        maxLContent.append(maxL);
                        maxLContent.append(resultmaxL);

                        maxL.oninput = function() {
                            resultmaxL.innerHTML = `${maxL.value}$`;
                            minL.innerHTML = `<span class="form-control mt-3">Min loan: ${Math.floor(maxL.value*20/100) }$</span>`;
                            content.append(minL);
                            let payClear = +`${(maxL.value-Math.floor(maxL.value*20/100))}`;

                            let rate = +`${(payClear * userBanksCookieDataArrayList[i][3]/100)/12}` ;

                            payPerMonth = +`${(rate + payClear)/userBanksCookieDataArrayList[i][6]}`;

                            monthPayment.innerHTML =  `<span class="mt-4">Your monthly mortgage payment: <h3>${Math.floor(payPerMonth)}</h3> </span>`;
                            content.append(monthPayment);
                            calculatorContent.append(monthlyButton);
                        }

                        content.append(loanTerm);
                    }
                }


                //monthly payment table
                monthlyButton.addEventListener('click',()=>{
                    let tableWrapper = document.createElement('div');
                    tableWrapper.className = "tableWrapper mt-5";

                    let table = document.createElement('table');
                    table.className = "table table-bordered";
                    table.id = "tableCalc";

                    let thead = document.createElement('thead');

                    let tr = document.createElement('tr');

                    tr.innerHTML = `
        <th scope="col">Month</th>
      <th scope="col">Total payment</th>
      <th scope="col">Interest payment</th>
      <th scope="col">Loan balance</th>
      <th scope="col">Equity</th>
        `;

                    let tbody = document.createElement('tbody');

                    for(let i =0; i < userBanksCookieDataArrayList.length;i++){
                        if(userBanksCookieDataArrayList[i].includes(bankNameSelect.value)){
                            let minPay = userBanksCookieDataArrayList[i][4]*20/100;
                            let count = +`${userBanksCookieDataArrayList[i][4]-minPay}`;
                            let length = +userBanksCookieDataArrayList[i][6]+1;
                            let countCapitalMonth = +userBanksCookieDataArrayList[i][4]/userBanksCookieDataArrayList[i][6];
                            let countCapital = countCapitalMonth;

                            let interRate = userBanksCookieDataArrayList[i][3]/12;
                            for(let j = 1; j < length;j++){
                                let tr = document.createElement('tr');

                                tr.innerHTML = `
                <td>${j}</td>
                <td>${Math.floor(payPerMonth)}</td>
                <td>${Math.floor(count*interRate/100)}</td>
                <td>${Math.floor(count)}</td>
                <td>${Math.floor(countCapital)}</td>
                `;
                                count = count-payPerMonth;
                                countCapital = +countCapitalMonth+countCapital;

                                tbody.append(tr);
                            }


                        }}
                    calculatorContent.append(tableWrapper);
                    tableWrapper.append(table);
                    table.append(thead);
                    thead.append(tr);
                    table.append(tbody);
                })



            });
        }



}

