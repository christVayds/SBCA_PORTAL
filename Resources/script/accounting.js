
function getFullDate(){
    var date = new Date();

    var day = String(date.getDate()).padStart(2, '0');
    var month = String(date.getMonth() + 1).padStart(2, '0');
    var year = String(date.getFullYear());

    return year + '-' + month + '-' + day;
}

function loadPicker(data=[]){
    var semesterPicker = document.getElementById('accounting-payment-semesterLevel');

    var newOption = document.createElement('option');
    newOption.value = data[1];
    newOption.textContent = data[0];

    semesterPicker.appendChild(newOption);
}

function openAccPopup(message, header, icon=false){
    document.getElementById('acc_popupmessage').classList.add('showPopUpBG');
    document.getElementById('acc_popupContent').textContent = message;
    document.getElementById('acc_popupHeader').textContent = header;
    if(icon){
        document.getElementById('acc_popupIcon').className = icon;
    }
}

function adminListPayments(data=[]){
    var payments = document.getElementById('display-payments');

    var newItem = document.createElement('div');
    newItem.className = 'item';

    var header = document.createElement('h4');
    header.textContent = data[0];

    var paymentInfo = document.createElement('div');
    paymentInfo.className = 'payment-info';

    const labels = ['', 'Amount: ', 'Balance: ', 'Payment method: ', 'Notes: '];
    for(var i=0;i<5;i++){
        var newP = document.createElement('p');
        newP.textContent = labels[i] + data[1+i];
        paymentInfo.appendChild(newP);
    }


    newItem.appendChild(header);
    newItem.appendChild(paymentInfo);
    payments.appendChild(newItem);
}

$(document).ready(function(){

    // get student payments made
    function fetchStudentPaymentMade(username){
        $.ajax({
            url: '../../Model/accounting.inc.php',
            type: 'POST',
            data: {
                fetchStdPaymentMade: true,
                username: username
            },
            success: function(response){
                $('#display-payments div').remove();
                if(response.success){
                    console.log('yeah' + response.message);
                    response.data.forEach(data => {
                        adminListPayments(data);
                    });
                } else {
                    console.log(response.message);
                }

                document.getElementById('accounting-viewHistory').classList.add('view');
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    // show search input
    $('#search-student-account').click(function(){
        document.getElementById('search-account').classList.add('show-search-account');
    });

    $('#exit_student_acc_popup').click(function(){
        document.getElementById('account_info_popup').classList.remove('showPopUp');
        document.getElementById('accounting-viewHistory').classList.remove('view');
    });

    $('.useraccinlist').click(function(){
        var user = $(this).attr('id');

        console.log('user' + user);
    });

    $('#student-account-table').on('click', '.useraccinlist', function(){
        const user = $(this).attr('id');
        const datepicker = document.getElementById('accounting_date-today');
        datepicker.value = getFullDate();
        
        $.ajax({
            url: '../../Model/accounting.inc.php',
            type: 'POST',
            data: {
                updateAccount: user
            },
            success: function(response){
                if(response.success){
                    // show pop up
                    document.getElementById('account_info_popup').classList.add('showPopUp');

                    // insert data
                    document.getElementById('accounting-payment-username').value = user;
                    document.getElementById('Acc_fullname').textContent = response.data['name'];
                    document.getElementById('Acc_usercourse').textContent = response.data['course'];
                    document.getElementById('Acc_schoolid').textContent = response.data['userid'];
                    document.getElementById('acc-user-image').src = response.data['profile-image'];
                    document.getElementById('acc-balance').textContent = response.data['balance'];
                    document.getElementById('acc-total_ass').textContent = response.data['total_assessment'];

                    // clear the semester picker
                    $('#accounting-payment-semesterLevel option').remove();

                    // get the list of semester and sy where student is enrolled
                    $.ajax({
                        url: '../../Model/accounting.inc.php',
                        type: 'POST',
                        data: {
                            getStudentEnrolled: user
                        },
                        success: function(response){
                            if(response.success){
                                response.data.forEach(data => {
                                    loadPicker(data);
                                });
                            }
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }
            },
            error: function(){
                console.log('error');
            }
        })
    });

    // save student account
    $('#save-std-account').click(function(){
        // const user = document.getElementById('accounting-payment-username');
        const date = document.getElementById('accounting_date-today');
        const amount = document.getElementById('accounting-payment-amount');
        const account = document.getElementById('accounting-payment-semesterLevel'); // list of account of student
        const method = document.getElementById('accounting-payment-pm');
        const note = document.getElementById('accounting-payment-note');

        if(amount.value != ''){
            $.ajax({
                url: '../Model/accounting.inc.php',
                type: 'POST',
                data: {
                    studentPayment: true,
                    date: date.value,
                    amount: amount.value,
                    method: method.value,
                    note: note.value,
                    payment_account: account.value
                },
                success: function(response){
                    if(response.success){
                        openAccPopup(response.message, 'Saved');
                    } else {
                        openAccPopup(response.message, 'Error');
                    }
                    amount.value = '';
                    note.value = '';
    
                    document.getElementById('account_info_popup').classList.remove('showPopUp');
                },
                error: function(error){
                    openAccPopup('Database Error', 'Error');
                }
            });
        }
    });

    // exit popup
    $('#exit_acc-popup').click(function(){
        document.getElementById('acc_popupmessage').classList.remove('showPopUpBG');
    });

    // view account history
    $('#history-std-account').click(function(){
        const username = document.getElementById('accounting-payment-username').value;
        fetchStudentPaymentMade(username);
    });

});