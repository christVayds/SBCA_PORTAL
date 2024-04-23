<?php
    include 'base.php';
?>

<div class="messages">
    <div class="mside actiontabs">
        <div class="header">
            <h2>Messages</h2>
        </div>
        <div class="actions">
            <a href="#" id="messages">
                <div class="button compose">
                    <i class="fa-solid fa-file-pen"></i>
                    <p>New Message</p>
                </div>
            </a>
            <a href="#" id="inbox">
                <div class="button" id="active">
                    <i class="fa-solid fa-inbox"></i>
                    <p>Inbox</p>
                </div>
            </a>
            <a href="#" id="sent">
                <div class="button">
                    <i class="fa-solid fa-envelope-circle-check"></i>
                    <p>Sent</p>
                </div>
            </a>
            <a href="#" id="bin">
                <div class="button">
                    <i class="fa-solid fa-trash"></i>
                    <p>Bin</p>
                </div>
            </a>
            <a href="#" id="setting">
                <div class="button">
                    <i class="fa-solid fa-gear"></i>
                    <p>Settings</p>
                </div>
            </a>
        </div>
    </div>
    <div class="mside message">
        <div class="cardmessage">
            <div class="header">
                <div class="messageoptions">
                    <div class="option">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                    <div class="option">
                        <i class="fa-solid fa-rotate-right"></i>
                    </div>
                </div>
                <div class="pageoption">
                    <div class="pagecount">
                        <p>Page: 1-1</p>
                    </div>
                    <div class="pagenav">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                    <div class="pagenav">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="messagesList">
                <table id="messageTable">
                    <tr id="new">
                        <td id="sender">
                            <p>Christian Vaydal</p>
                        </td>
                        <td id="message">
                            <div class="messageContent">
                                <p id="subject">Hello world</p>
                                <p id="body">Hello world...</p>
                            </div>
                        </td>
                        <td id="time">
                            <p>1:30pm</p>
                        </td>
                    </tr>

                    <tr>
                        <td id="sender">
                            <p>SBCA Portal</p>
                        </td>
                        <td id="message">
                            <div class="messageContent">
                                <p id="subject">Hello world</p>
                                <p id="body">Hello world...</p>
                            </div>
                        </td>
                        <td id="time">
                            <p>1:30pm</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>