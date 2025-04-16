<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Galway Compass Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/chat.css">
    <link rel="stylesheet" href="CSS/navbar.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand hover-effect" href="index.php">
                <video src="IMG/Logo/AnimatedLogo.mp4" class="img-fluid" style="width: 150px;" autoplay loop muted
                    playsinline controlslist="nodownload"></video>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link hover-effect gabarito" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="history.php">History</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="events.php">Events</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect active" href="#"
                            style="color: #001F54;">Chat</a></li>
                    <li class="nav-item"><a class="nav-link gabarito hover-effect" href="#">Help</a></li>
                </ul>
                <ul class="d-flex navbar-nav">
                    <?php if (isset($_SESSION['first_name'])): ?>
                        <li class="nav-item">
                            <span class="navbar-text me-4"
                                style="border-color: #1282A2; color: #1282A2"><?php echo ucfirst($_SESSION['first_name']); ?></span>
                        </li>
                        <li><a class="btn gabarito hover-effect me-2 mb-2" href="logout.php"
                                style="border-color: #1282A2; color: #1282A2">Log Out</a></li>
                    <?php else: ?>
                        <li><button class="btn gabarito hover-effect me-2 mb-2"
                                style="border-color: #1282A2; color: #1282A2"><a href="login.php"
                                    style="color: #1282A2; text-decoration: none;">Log In</a></button></li>
                        <li><button class="btn gabarito hover-effect me-2" style="background-color: #1282A2"><a
                                    href="signup.php" style="color: #fff; text-decoration: none;">Sign Up</a></button></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <h2 class="mb-4">Chat to Others</h2>
        <div id="chat-box" class="mb-4"></div>

        <form id="chat-form" enctype="multipart/form-data">
            <div class="mb-3">
                <textarea name="message" id="message" class="form-control" placeholder="Type a message..."></textarea>
            </div>
            <div class="mb-3">
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn" style="background-color: #1282A2; color: #fff;">Send</button>
        </form>
    </div>

    <script>
        const chatBox = document.getElementById('chat-box');
        const form = document.getElementById('chat-form');
        let lastMessageId = 0; // Track the ID of the last message

        function loadMessages() {
            // Fetch new messages with the ID of the last message
            fetch(`fetch_messages.php?last_message_id=${lastMessageId}`)
                .then(res => res.json())
                .then(messages => {
                    if (messages.length > 0) {
                        // Append new messages to chat box
                        messages.forEach(msg => {
                            const div = document.createElement('div');
                            div.classList.add('message');

                            // Check if the message is from the current user (logged-in user)
                            const isMine = msg.user_id === <?php echo $_SESSION['user_id']; ?>;

                            if (isMine) {
                                div.classList.add('mine'); // Sender's message (right side)
                            } else {
                                div.classList.add('other'); // Other user's message (left side)
                            }

                            let content = '';
                            if (msg.message_type === 'text') {
                                content = `<p>${msg.message}</p>`;
                            } else if (msg.message_type === 'image') {
                                content = `<img src="${msg.message}" alt="Image message">`;
                            } else if (msg.message_type === 'video') {
                                content = `<video controls src="${msg.message}"></video>`;
                            }

                            div.innerHTML = `
                                <div class="message-content">
                                    <span class="username">${msg.username}</span>
                                    <span class="timestamp">[${new Date(msg.sent_at).toLocaleString()}]</span>
                                    <div class="content">${content}</div>
                                </div>
                            `;
                            chatBox.appendChild(div);
                            lastMessageId = msg.id; // Update the last message ID
                        });

                        // Scroll to the bottom of the chat box
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                })
                .catch(err => console.error('Error loading messages:', err));
        }

        form.addEventListener('submit', e => {
            e.preventDefault();
            const formData = new FormData(form);

            fetch('send_message.php', {
                method: 'POST',
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        form.reset();
                        loadMessages(); // Reload messages after sending
                    } else {
                        alert(data.error || 'Message failed to send.');
                    }
                })
                .catch(err => console.error('Send error:', err));
        });

        // Load messages initially and then every 3 seconds
        loadMessages();
        setInterval(loadMessages, 3000); // Check for new messages every 3 seconds

    </script>
</body>

</html>