<?php
$con = mysqli_connect(
    'db', # service name
    'php_docker_exam_3', # username
    'password', # password
    'php_docker_exam_3' # db table
);

// 8: BackSpace// 9: Tab// 13: Enter// 16: Shift// 17: Ctrl// 18: Alt// 19: Pause/Break
// 20: Caps Lock// 27: Esc// 32: Space// 33: Page Up// 34: Page Down// 35: End// 36: Home
// 37: Left Arrow// 38: Up Arrow// 39: Right Arrow// 40: Down Arrow// 45: Insert
// 46: Delete// 48-57: Số từ 0 đến 9// 65-90: Chữ cái từ A đến Z (viết hoa)
// 96-105: Số trên phím số bên phải (Numpad)// 112-123: Các phím từ F1 đến F12
// 144: Num Lock// 145: Scroll Lock