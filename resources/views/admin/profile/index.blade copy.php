<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile - Account Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .profile-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .profile-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .avatar-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            cursor: pointer;
        }

        .avatar-upload:hover .avatar-overlay {
            opacity: 1;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.4);
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-arrow-left text-xl"></i>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Profile Settings</h1>
                        <p class="text-gray-600">Manage your account settings and preferences</p>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">Cancel</button>
                    <button class="btn-primary text-white px-6 py-2 rounded-lg font-medium">Save Changes</button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="space-y-6">

            <!-- Profile Photo -->
            <div class="profile-card p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Profile Photo</h3>
                <div class="flex items-center space-x-6">
                    <div class="relative avatar-upload">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face"
                            alt="Profile" class="w-24 h-24 rounded-full object-cover">
                        <div class="avatar-overlay">
                            <i class="fas fa-camera text-white text-xl"></i>
                        </div>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800 mb-2">Change Profile Picture</h4>
                        <p class="text-sm text-gray-600 mb-4">JPG, PNG or GIF. Max size 2MB.</p>
                        <div class="flex space-x-3">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Upload
                                New</button>
                            <button class="text-gray-600 px-4 py-2 rounded-lg text-sm hover:bg-gray-100">Remove</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Email Editor -->
            <div class="profile-card p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Email Address</h3>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-800 font-medium">user@example.com</p>
                        <p class="text-sm text-gray-600">Your email address for login and notifications</p>
                    </div>
                    <button class="text-blue-600 hover:text-blue-700 font-medium">Edit</button>
                </div>
            </div>

            <!-- Change Password -->
            <div class="profile-card p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Change Password</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                        <div class="relative">
                            <input type="password"
                                class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                required>
                            <button type="button" class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600"><i
                                    class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <div class="relative">
                            <input type="password"
                                class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                required>
                            <button type="button" class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600"><i
                                    class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                        <div class="relative">
                            <input type="password"
                                class="w-full px-3 py-2 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                required>
                            <button type="button" class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600"><i
                                    class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="btn-primary text-white px-6 py-2 rounded-lg font-medium">Update
                        Password</button>
                </form>
            </div>

            <!-- Delete Account -->
            <div class="profile-card p-6 border-red-200">
                <h3 class="text-lg font-semibold text-red-600 mb-4">Danger Zone</h3>
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <h4 class="font-medium text-red-800 mb-2">Delete Account</h4>
                    <p class="text-sm text-red-700 mb-4">Once you delete your account, there is no going back. Please be
                        certain.</p>
                    <button class="btn-danger text-white px-4 py-2 rounded-lg font-medium">Delete My Account</button>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
