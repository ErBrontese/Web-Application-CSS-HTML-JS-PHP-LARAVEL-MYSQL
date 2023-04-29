
function startProcess() {
    if ($('#inp_amount').val() > 0) {
        // run metamsk functions here
        EThAppDeploy.loadEtherium();
    } else {
        alert('Please Enter Valid Amount');
    }
}


EThAppDeploy = {
    loadEtherium: async () => {
        if (typeof window.ethereum !== 'undefined') {
            EThAppDeploy.web3Provider = ethereum;
            EThAppDeploy.requestAccount(ethereum);
        } else {
            alert(
                "Not able to locate an Ethereum connection, please install a Metamask wallet"
            );
        }
    },
    /****
     * Request A Account
     * **/
    requestAccount: async (ethereum) => {
        ethereum
            .request({
                method: 'eth_requestAccounts'
            })
            .then((resp) => {
                //do payments with activated account
                EThAppDeploy.payNow(ethereum, resp[0]);
            })
            .catch((err) => {
                // Some unexpected error.
                console.log(err);
            });
    },
    /***
     *
     * Do Payment
     * */
    payNow: async (ethereum, from) => {
        var amount = $('#inp_amount').val();
        ethereum
            .request({
                method: 'eth_sendTransaction',
                params: [{
                    from: from,
                    to: "0x1787Ad280fb7870eceDbf286681A2C83E94957FB",
                    value: '0x' + ((amount * 1000000000000000000).toString(16)),
                }, ],
            })
            .then((txHash) => {
                if (txHash) {
                    console.log(txHash);
                    storeTransaction(txHash, amount);
                } else {
                    console.log("Something went wrong. Please try again");
                }
            })
            .catch((error) => {
                console.log(error);
            });
    },
}


function storeTransaction(txHash, amount) {
    console.log("ciao2");
    $.ajax({
        url: "{{ route('metamask/transaction/create') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {
            txHash: txHash,
            amount: amount,
        },
        success: function(response) {
            // reload page after success
            window.location.replace("/");

        }
    });
}
