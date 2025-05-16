<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        
        .form-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        
        .password-strength {
            height: 5px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="flex justify-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-600 text-white">
                        <i class="fas fa-book-open text-3xl"></i>
                    </div>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Create your account
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Or
                    <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        sign in to your existing account
                    </a>
                </p>
            </div>
            
            <div class="mt-8 bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form id="register_form" action="{{ route('register') }}" method="GET" class="space-y-6" id="registerForm">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700">
                                First Name
                            </label>
                            <div class="mt-1">
                                <input id="firstName" name="firstName" value="{{ old('first_name') }}" type="text" required class="form-input block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none p-2 border">
                            </div>
                        </div>
                        
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700">
                                Last Name
                            </label>
                            <div class="mt-1">
                                <input id="lastName" name="lastName" type="text" required class="form-input block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none p-2 border">
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required class="form-input block w-full pl-10 sm:text-sm border-gray-300 rounded-md focus:outline-none p-2 border" placeholder="you@example.com">
                        </div>
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="new-password" required class="form-input block w-full pl-10 sm:text-sm border-gray-300 rounded-md focus:outline-none p-2 border" placeholder="••••••••">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="togglePassword" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="w-full bg-gray-200 rounded-full h-1">
                                <div id="passwordStrength" class="password-strength bg-red-500 rounded-full w-0"></div>
                            </div>
                            <p id="passwordFeedback" class="mt-1 text-xs text-gray-500">Password must be at least 8 characters</p>
                        </div>
                    </div>
                    
                    <div>
                        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">
                            Confirm Password
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="confirmPassword" name="confirmPassword" type="password" autocomplete="new-password" required class="form-input block w-full pl-10 sm:text-sm border-gray-300 rounded-md focus:outline-none p-2 border" placeholder="••••••••">
                        </div>
                        <p id="passwordMatch" class="mt-1 text-xs text-gray-500 hidden">Passwords match</p>
                    </div>
                    
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700">
                            Account Type
                        </label>
                        <div class="mt-1">
                            <select id="role" name="role" class="form-input block w-full sm:text-sm border-gray-300 rounded-md focus:outline-none p-2 border">
                                <option value="member">Member</option>
                                <option value="admin">admin</option>
                            </select>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Librarian accounts require approval from an administrator</p>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-900">
                            I agree to the 
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Terms of Service</a>
                            and
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-user-plus text-indigo-500 group-hover:text-indigo-400"></i>
                            </span>
                            Create Account
                        </button>
                    </div>
                </form>
                
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">
                                Or register with
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <div>
                            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <i class="fab fa-google"></i>
                                <span class="ml-2">Google</span>
                            </a>
                        </div>

                        <div>
                            <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <i class="fab fa-microsoft"></i>
                                <span class="ml-2">Microsoft</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    &copy; 2023 E-Library. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = 'Hide';
        } else {
            input.type = 'password';
            button.textContent = 'Show';
        }
    }
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
        
        // Password strength meter
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('passwordStrength');
            const feedback = document.getElementById('passwordFeedback');
            
            // Calculate strength
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]+/)) strength += 25;
            if (password.match(/[A-Z]+/)) strength += 25;
            if (password.match(/[0-9]+/) || password.match(/[^a-zA-Z0-9]+/)) strength += 25;
            
            // Update UI
            strengthBar.style.width = strength + '%';
            
            if (strength <= 25) {
                strengthBar.className = 'password-strength bg-red-500 rounded-full';
                feedback.textContent = 'Password is weak';
            } else if (strength <= 50) {
                strengthBar.className = 'password-strength bg-orange-500 rounded-full';
                feedback.textContent = 'Password is moderate';
            } else if (strength <= 75) {
                strengthBar.className = 'password-strength bg-yellow-500 rounded-full';
                feedback.textContent = 'Password is good';
            } else {
                strengthBar.className = 'password-strength bg-green-500 rounded-full';
                feedback.textContent = 'Password is strong';
            }
            
            // Check if passwords match
            checkPasswordsMatch();
        });
        
        // Check if passwords match
        function checkPasswordsMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const matchText = document.getElementById('passwordMatch');
            
            if (confirmPassword) {
                if (password === confirmPassword) {
                    matchText.textContent = 'Passwords match';
                    matchText.className = 'mt-1 text-xs text-green-500';
                    matchText.classList.remove('hidden');
                } else {
                    matchText.textContent = 'Passwords do not match';
                    matchText.className = 'mt-1 text-xs text-red-500';
                    matchText.classList.remove('hidden');
                }
            } else {
                matchText.classList.add('hidden');
            }
        }
        
        document.getElementById('confirmPassword').addEventListener('input', checkPasswordsMatch);
        
        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const role = document.getElementById('role').value;
            const terms = document.getElementById('terms').checked;
            
            // Validate form
            if (!firstName || !lastName || !email || !password || !confirmPassword) {
                alert('Please fill in all required fields');
                return;
            }
            
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }
            
            if (!terms) {
                alert('You must agree to the Terms of Service and Privacy Policy');
                return;
            }
            
            // Here you would normally send the data to your backend for registration
            // For demo purposes, we'll just redirect to the login page
            console.log('Registration attempt with:', email, role);
            
            alert('Registration successful! Please log in with your new account.');
            window.location.href = '{{ route('login') }}'; // Redirect to login page
        });
    </script>
</body>
</html>