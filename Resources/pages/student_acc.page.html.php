<!-- <div class="acc_header">
    <div class="_acc_actions">

        <div class="acc_actions">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </div>

        <div class="dropdown">
            <div class="selection">
                <div class="label">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <p>View payment history</p>
                </div>
            </div>

            <div class="selection">
                <div class="label">
                    <i class="fa-solid fa-download"></i>
                    <p>Report a problem</p>
                </div>
            </div>
        </div>
    </div>

    <div class="acc_actions">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rotate-cw"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/></svg>
    </div>
</div> -->

<div class="acc_table std_viewAccount">
    <div class="account_table_header">
        <h2>SOA</h2>
        <p>Name of student: <span id="display_acc_std-name">Loading name...</span></p>
        <p>Level: <span id="display_acc_std-course">BS in Information Technology</span></p>
    </div>

    <h3>Statement of Account for the month of <span id="display_acc_stmt-month">OCTORBER 2024</span></h3>
    <div class="acc_table_assessments">
        <div class="table table_L" id="table_L">
            <!-- current account balance here -->
            <div class="acc_info account_this_sem">
                <p>Balance: <span id="display_acc_std-balance">0.00</span></p>
                <p>Schedule of payment: Monthly</p>
                <p>Total assessment: <span id="display_acc_std-totalAssessment">0.00</span></p>
                <p>Monthly: 2,000</p>
                <p>Number of units: <span id="display_acc_std-numUnits">25 UNITS</span></p>
            </div>

            <div class="acc_info paid_balance">
                <h3>Payments made:</h3>
                <div class="acc_balance">
                    <p>Total Balance: <span id="display_acc_current-balance">0.00</span></p>
                </div>
                <table class="display-table" id="display_acc_table_paymentsMade">
                    <thead class="table-row">
                        <th class="table-header table-short">Date</th>
                        <th class="table-header table-long">Semester</th>
                        <th class="table-header table-num">Amount</th>
                        <th class="table-header table-num">Method</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div class="table table_R" id="table_R">
            <!-- other info here -->
            <div class="tuitionfeeinfo">
                <div class="item">
                    <p>T.FEE</p>
                    <p id="display_acc_std-fee-balance">0.00</p>
                </div>
                <div class="item">
                    <p>MISC:</p>
                    <p id="display_acc_std-fee-misc">0.00</p>
                </div>
                <div class="item">
                    <p>Lab fee:</p>
                    <p id="display_acc_std-fee-lab">0.00</p>
                </div>
                <div class="item break">
                    <p>TOTAL:</p>
                    <p id="display_acc_std-fee-total">0.00</p>
                </div>
            </div>

            <!-- <h3 class="scheduletitle">Schedule of payments:</h3>
            <div class="schedultofpayments">
                <div class="side side_l">
                    <div class="item">
                        <p>September</p>
                        <p></p>
                    </div>
                    <div class="item">
                        <p>October</p>
                        <p></p>
                    </div>
                    <div class="item">
                        <p>November</p>
                        <p>2,000</p>
                    </div>
                </div>
                <div class="side side_r">
                    <div class="item">
                        <p>December</p>
                        <p>2,000</p>
                    </div>
                    <div class="item">
                        <p>January</p>
                        <p>2,000</p>
                    </div>
                </div>
            </div> -->
            <div class="otherbalance">
                <h3>Other balance (Total: <span id="display-acc_get-balance-bySemester"></span>)</h3>
                <div class="other_balance" id="display_acc_other-balance">
                    <div class="item">
                        <p>1st year 2nd semester: 100,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>