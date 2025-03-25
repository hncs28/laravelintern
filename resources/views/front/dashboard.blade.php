<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .top-menu {
            background-color: #222;
            color: white;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 15px 20px;
            height: 60px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .top-menu a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-size: 16px;
        }

        .top-menu button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .top-menu button:hover {
            background-color: #0056b3;
        }

        .top-menu .logoutBtn {
            background-color: red;
        }

        .top-menu .logoutBtn:hover {
            background-color: darkred;
        }

        .container {
            display: flex;
            margin-top: 60px;
        }

        .vertical-menu {
            width: 250px;
            background-color: #fff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            padding-top: 20px;
            height: calc(100vh - 60px);
            position: fixed;
            left: 0;
            top: 60px;
            overflow-y: auto;
        }

        .vertical-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .vertical-menu li {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
        }

        .vertical-menu li a {
            text-decoration: none;
            color: #333;
            display: block;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .vertical-menu li:hover {
            background-color: #f0f0f0;
        }

        .vertical-menu li a:hover {
            color: #007bff;
        }


        .course-container {
            margin-left: 270px;
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 90px;
        }


        .course-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 400px;
            height: auto;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .image-container img {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            object-fit: cover;
        }

        .course-card h3 {
            margin: 10px 0;
            font-size: 18px;
            color: #333;
        }

        .course-card p {
            font-size: 16px;
            color: #555;
        }

        .RegisCourse {
            background-color: green;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        @media (max-width: 1024px) {
            .course-container {
                margin-left: 260px;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .top-menu {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
            }

            .vertical-menu {
                width: 220px;
                padding-top: 10px;
            }

            .course-container {
                margin-left: 230px;
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            }
        }

        @media (max-width: 600px) {
            .vertical-menu {
                width: 100%;
                position: static;
                height: auto;
                box-shadow: none;
            }

            .course-container {
                margin-left: 0;
                padding: 20px;
                grid-template-columns: 1fr;
            }
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .cart-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item h3 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #333;
        }

        .cart-item p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        .cart-item .remove-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        .cart-item .remove-btn:hover {
            background-color: darkred;
        }

        .empty-cart {
            text-align: center;
            color: #888;
        }


        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .user-items {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-items h3 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #333;
        }

        .user-items p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        .course-items {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .course-items h3 {
            margin: 0 0 10px;
            font-size: 20px;
            color: #333;
        }

        .course-items p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <header>
        <div class="top-menu">
            <a><button id="myaccount">My Account</button></a>
            <a><button id="mycourses">My Courses</button></a>
            <a><button id="showCartBtn">Show Cart</button></a>
            <a><button id="logoutBtn" class="logoutBtn">Logout</button></a>
        </div>
    </header>

    <div class="vertical-menu">
        <ul id="category-list">
        </ul>
    </div>


    <div class="course-container">
    </div>
    <div id="course-count" style="text-align:center; margin-top:20px; font-weight:bold;"></div>
    <div id="lecture-count" style="text-align:center; margin-top:20px; font-weight:bold;">
        Total lectures: {{ Cache::get('total_lectures', 'N/A') }}
    </div>
    <div id="cartModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">×</span>
            <h2>Your Cart</h2>
            <div id="cart-items"></div>
            <button class="save-cart">Save to your account</button>
        </div>
    </div>
    <div id="courseModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">×</span>
            <h2>Your Courses</h2>
            <div id="course-items"></div>
        </div>
    </div>
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">×</span>
            <h2>Your Account</h2>
            <div id="user-items"></div>
        </div>
    </div>
</body>

</html>
<script>
    var baseurl = "{{ config('app.url') }}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $("#logoutBtn").click(function() {
            logout();
        });

    });

    function logout() {
        if (!confirm("Wanna get out??")) return;
        $.ajax({
            url: `${baseurl}/api/logout`,
            type: "POST",
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('Token')
            },
            success: function(response) {
                localStorage.removeItem("Token");
                window.location.href = "{{ route('loginform') }}";
            },
            error: function(xhr) {
                alert("Logout failed: " + xhr.responseText);
            }
        });
    }

    function fetchcourse() {
        $(document).ready(function() {
            $.ajax({
                url: `${baseurl}/api/get/allcourses`,
                type: "GET",
                dataType: "json",
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('Token')
                },
                success: function(data) {
                    let courseHTML = "";
                    data.forEach(course => {
                        courseHTML += `
                        <div class="course-card">
                            <div class="image-container">
                                <img src="${course.img}" alt="${course.courseName}">
                            </div>
                            <h3>${course.courseName}</h3>
                            <p>${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(course.coursePrice)}</p>
                            <p>Lecture Name: ${course.lectureName}</p>
                            <button class="RegisCourse" id="RegisCourse" data-id="${course.courseID}">Add to cart</button>
                        </div>
                        `;
                    });
                    $(".course-container").html(courseHTML);
                    $(document).on('click', '.RegisCourse', function() {
                        const $courseId = $(this).data('id');
                        const $button = $(this);
                        $.ajax({

                            url: `${baseurl}/add-to-cart`,
                            method: 'POST',
                            headers: {
                                'Authorization': 'Bearer ' + localStorage.getItem(
                                    'Token')
                            },
                            xhrFields: {
                                withCredentials: true
                            },
                            data: {
                                id: $courseId
                            },
                            success: function(response) {
                                alert(response.message);
                                $button.prop('disabled', true).text('In Cart');
                            },
                            error: function(xhr) {
                                const errorMsg = xhr.responseJSON?.message ||
                                    'Error adding to cart';
                                alert(errorMsg);
                                console.error('Error:', xhr.status, xhr
                                    .responseText);
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching courses:", error);
                }
            });
            $.ajax({
                url: `${baseurl}/api/lectures/count`,
                type: "GET",
                dataType: "json",
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('Token')
                },
                success: function(response) {
                    $('#lecture-count').text(`Total lectures: ${response.total_lectures}`);
                }
            });
            $.ajax({
                url: `${baseurl}/api/get/category`,
                type: "GET",
                dataType: "json",
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('Token')
                },
                success: function(response) {
                    let categoryList = $("#category-list");
                    response.forEach(category => {
                        categoryList.append(
                            `<li><a href="#" onclick="fetchCategory(${category.id})">${category.categoryName}</a></li>`
                        );
                    });
                },
                error: function(error) {
                    console.error("Error fetching categories:", error);
                }
            });
        });
    }
    fetchcourse();



    function fetchCategory(id) {
        $.ajax({
            url: `${baseurl}/api/courses/category/${id}`,
            type: "GET",
            dataType: "json",
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('Token')
            },
            success: function(data) {
                let courseHTML = "";

                if (data.length === 0) {
                    courseHTML = `<p>No courses found for this category.</p>`;
                } else {
                    data.forEach(course => {
                        courseHTML += `
                        <div class="course-card">
                            <div class="image-container">
                                <img src="${course.img}" alt="${course.courseName}">
                            </div>
                            <h3>${course.courseName}</h3>
                            <p>${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(course.coursePrice)}</p>
                            <p><button class="RegisCourse" id="RegisCourse" data-id="${course.id}">Add to cart</button></p>
                        </div>
                    `;
                    });
                }

                $(".course-container").html(courseHTML);
                $(document).on('click', '.RegisCourse', function() {
                    const courseId = $(this).data('id');
                    const $button = $(this);
                    $.ajax({

                        url: `${baseurl}/add-to-cart`,
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('Token')
                        },
                        success: function(response) {
                            alert(response.message);
                            $button.prop('disabled', true).text('In Cart');
                        },
                        error: function(xhr) {
                            const errorMsg = xhr.responseJSON?.message ||
                                'Error adding to cart';
                            alert(errorMsg);
                            console.error('Error:', xhr.status, xhr.responseText);
                        }
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching courses:", status, error);
                $(".course-container").html(
                    `<p class="error">Failed to load courses. Please try again.</p>`);
            }
        });
    }
    $('#showCartBtn').on('click', function() {
        $('#cartModal').css('display', 'flex');

        $.ajax({
            url: `${baseurl}/cart`,
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('Token')
            },
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                const cartItems = response.data;
                const $cartItemsContainer = $('#cart-items');
                $cartItemsContainer.empty();

                if (cartItems.length === 0) {
                    $cartItemsContainer.html('<p class="empty-cart">Your cart is empty.</p>');
                } else {
                    cartItems.forEach(function(item) {
                        const itemHtml = `
                                    <div class="cart-item">
                                        <h3>${item.course_name}</h3>
                                        <p>Course ID: ${item.course_id}</p>
                                        <p>${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(item.course_price)}</p>
                                        <button class="remove-btn" data-id="${item.course_id}">Remove</button>
                                    </div>
                                `;
                        $cartItemsContainer.append(itemHtml);
                    });

                }
            },
            error: function(xhr, status, error) {
                $('#cart-items').html('<p class="empty-cart">Error loading cart.</p>');
                console.error('Error:', status, error);
            }
        });
        $(document).on('click', '.save-cart', function() {
            $.ajax({
                url: `${baseurl}/save-cart`,
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('Token')
                },
                success: function(response) {
                    alert(response.message);
                    $('#cartModal').css('display', 'none');
                },
                error: function(xhr) {
                    const errorMsg = xhr.responseJSON?.message || 'Error saving cart';
                    alert(errorMsg);
                    console.error('Error:', xhr.status, xhr.responseText);
                }
            })
        });
    });

    $('.close-btn').on('click', function() {
        $('#cartModal').css('display', 'none');
    });

    $(window).on('click', function(event) {
        if (event.target === $('#cartModal')[0]) {
            $('#cartModal').css('display', 'none');
        }
    });
    $('#cart-items').on('click', '.remove-btn', function() {
        const courseId = $(this).data('id');
        const $item = $(this).closest('.cart-item');
        $.ajax({
            url: `${baseurl}/clear-cart/` + courseId,
            method: 'DELETE',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('Token')
            },
            success: function(response) {
                alert(response.message);
                $item.remove();
                if ($('#cart-items').children().length === 0) {
                    $('#cart-items').html('<p class="empty-cart">Your cart is empty.</p>');
                }
            },
            error: function(xhr) {
                const errorMsg = xhr.responseJSON?.message || 'Error removing from cart';
                alert(errorMsg);
                console.log('Error:', xhr.status, xhr.responseText);
            }
        });
    });
    $('#mycourses').on('click', function() {
        $('#courseModal').css('display', 'flex');

        $.ajax({
            url: `${baseurl}/api/get/courses`,
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('Token')
            },
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                const $courseItemsContainer = $('#course-items');
                $courseItemsContainer.empty();


                if (!response || !response.courses || !Array.isArray(response.courses)) {
                    $courseItemsContainer.html('<p class="empty-cart">No courses available.</p>');
                    console.error('Invalid response data:', response);
                    return;
                }

                const courseItems = response.courses;
                courseItems.forEach(function(item) {
                    const courseHtml = `
                    <div class="course-items">
                        <h3>${escapeHtml(item.courseName)}</h3>
                        <p>Course ID: ${escapeHtml(String(item.courseID))}</p>
                        <p>${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(item.coursePrice)}</p>
                    </div>
                `;
                    $courseItemsContainer.append(courseHtml);
                });
            },
            error: function(xhr, status, error) {
                $('#course-items').html('<p class="empty-cart">Error loading courses.</p>');
                console.error('Error:', status, error);
            }
        });
    });

    $('.close-btn').on('click', function() {
        $('#courseModal').css('display', 'none');
    });

    $(window).on('click', function(event) {
        if (event.target === $('#courseModal')[0]) {
            $('#courseModal').css('display', 'none');
        }
    });

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    $('#myaccount').on('click', function() {
        $('#userModal').css('display', 'flex');

        $.ajax({
            url: `${baseurl}/api/user/detail`,
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('Token')
            },
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                const $userItemscontainer = $('#user-items');
                $userItemscontainer.empty();

                if (!response || !response.id) {
                    $userItemscontainer.html(
                        '<p class="empty-cart">No user details available.</p>');
                    console.error('Invalid response data:', response);
                    return;
                }

                const userHtml = `
                    <div class="user-items">
                        <h3>${escapeHtml(response.name)}</h3>
                        <p>Email: ${escapeHtml(response.email)}</p>
                        <p>Date of Birth: ${escapeHtml(response.dob)}</p>
                        <p>Type of Vehicle: ${escapeHtml(response.typeofvehicle)}</p>
                    </div>
                `;
                $userItemscontainer.append(userHtml);
            },
            error: function(xhr, status, error) {
                $('#user-items').html('<p class="empty-cart">Error loading user details.</p>');
                console.error('Error:', status, error);
            }
        });
    });

    $('.close-btn').on('click', function() {
        $('#userModal').css('display', 'none');
    });

    $(window).on('click', function(event) {
        if (event.target === $('#userModal')[0]) {
            $('#userModal').css('display', 'none');
        }
    });

    function escapeHtml(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
</script>
