<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign In - EDUSENSE</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    .bg-gradient-brand {
      background: linear-gradient(135deg, #4ade80 0%, #2dd4bf 100%);
    }
    .input-focus-effect:focus {
      box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.3);
    }
    .floating-label {
      transition: all 0.2s ease-in-out;
    }
    .input-field:focus + .floating-label,
    .input-field:not(:placeholder-shown) + .floating-label {
      transform: translateY(-24px) scale(0.85);
      color: #10b981;
    }
    .input-field::placeholder {
      color: transparent;
    }
    .social-btn:hover {
      transform: translateY(-2px);
    }
    .login-card {
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
    .float-animation {
      animation: float 6s ease-in-out infinite;
    }
  </style>
</head>
<body class="min-h-screen bg-gray-50 flex flex-col md:flex-row">

  <!-- Left Panel -->
  <div class="w-full md:w-1/2 bg-gradient-brand text-white flex flex-col justify-center items-center p-10 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-white"></div>
      <div class="absolute top-1/4 right-20 w-16 h-16 rounded-full bg-white"></div>
      <div class="absolute bottom-40 left-1/4 w-24 h-24 rounded-full bg-white"></div>
      <div class="absolute bottom-20 right-10 w-12 h-12 rounded-full bg-white"></div>
    </div>
    
    <div class="text-center z-10 animate__animated animate__fadeInLeft">
      <div class="flex items-center justify-center mb-6 float-animation">
        <svg width="60" height="60" viewBox="0 0 24 24" fill="white">
          <path d="M12 3L3 9L12 15L21 9L12 3Z" />
          <path d="M3 9V17L7 19.5V11.5L3 9Z" />
          <path d="M12 15V23L21 17V9L12 15Z" />
        </svg>
        <span class="ml-3 text-4xl font-bold tracking-tight">EDUSENSE</span>
      </div>
      <h2 class="text-3xl font-bold mb-4">Welcome Back!</h2>
      <p class="text-lg max-w-md mx-auto opacity-90">Smart learning starts here. Unlock your potential with our intelligent learning platform designed for your success.</p>
      
      <div class="mt-10 p-6 bg-white bg-opacity-20 rounded-lg backdrop-filter backdrop-blur-sm max-w-md mx-auto">
        <div class="flex items-center mb-4">
          <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="font-bold">Personalized Learning</h3>
            <p class="text-sm opacity-90">Tailored to your unique needs</p>
          </div>
        </div>
        
        <div class="flex items-center mb-4">
          <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="font-bold">Smart Analytics</h3>
            <p class="text-sm opacity-90">Track your progress with AI insights</p>
          </div>
        </div>
        
        <div class="flex items-center">
          <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <div class="ml-4">
            <h3 class="font-bold">Collaborative Learning</h3>
            <p class="text-sm opacity-90">Learn better together</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel (Sign In Form) -->
  <div class="w-full md:w-1/2 bg-white flex flex-col justify-center p-8 md:p-12 lg:px-20">
    <div class="max-w-md mx-auto w-full login-card rounded-xl bg-white p-8 animate__animated animate__fadeInRight">
      <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center">Sign In</h2>
      <p class="text-gray-500 text-center mb-8">Enter your credentials to access your account</p>
      
      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div class="relative mb-4">
          <input type="email" name="email" id="email" class="input-field w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-green-500 input-focus-effect transition" placeholder=" "/>
          <label for="email" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none">Email Address</label>
        </div>

        <div class="relative mb-4">
          <input type="password" name="password" id="password" class="input-field w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-green-500 input-focus-effect transition" placeholder=" "/>
          <label for="password" class="floating-label absolute left-4 top-3 text-gray-500 pointer-events-none">Password</label>
          <button type="button" class="absolute right-4 top-3 text-gray-400 hover:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </button>
        </div>

        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center space-x-2 cursor-pointer group">
            <div class="relative">
              <input type="checkbox" class="opacity-0 absolute h-5 w-5" />
              <div class="border border-gray-300 w-5 h-5 rounded group-hover:border-green-500 transition">
                <svg class="w-4 h-4 text-green-500 opacity-0 group-hover:opacity-40" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
            <span class="text-gray-600 group-hover:text-gray-800 transition">Remember Me</span>
          </label>
          <a href="#" class="text-green-500 hover:text-green-700 font-medium transition">Forgot Password?</a>
        </div>

        <button type="submit" class="w-full bg-gradient-brand hover:opacity-90 text-white py-3 rounded-lg font-semibold transition transform hover:-translate-y-0.5 shadow-lg">Sign In</button>

        <p class="text-center text-sm text-gray-600 mt-4">
          Don't have an account?
          <a href="{{ route('register') }}" class="text-green-500 hover:text-green-700 font-medium">Create Account</a>
        </p>

        <div class="flex items-center my-6">
          <div class="flex-grow h-px bg-gray-200"></div>
          <span class="px-4 text-gray-400 text-sm font-medium">Or continue with</span>
          <div class="flex-grow h-px bg-gray-200"></div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <button type="button" class="social-btn flex items-center justify-center border border-gray-300 py-2 px-4 rounded-lg bg-white hover:bg-gray-50 transition duration-300 shadow-sm">
            <img src="/api/placeholder/20/20" alt="Google" class="w-5 h-5 mr-2" />
            Google
          </button>
          <button type="button" class="social-btn flex items-center justify-center border border-gray-300 py-2 px-4 rounded-lg bg-white hover:bg-gray-50 transition duration-300 shadow-sm">
            <svg class="w-5 h-5 mr-2 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
            </svg>
            Facebook
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Add focus/blur event listeners to inputs
    document.querySelectorAll('.input-field').forEach(input => {
      // Initial check for pre-filled inputs
      if (input.value !== '') {
        input.nextElementSibling.classList.add('transform', 'translateY(-24px)', 'scale-85', 'text-green-500');
      }
      
      // Toggle password visibility
      if (input.type === 'password') {
        const toggleBtn = input.nextElementSibling.nextElementSibling;
        toggleBtn.addEventListener('click', () => {
          if (input.type === 'password') {
            input.type = 'text';
            toggleBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>`;
          } else {
            input.type = 'password';
            toggleBtn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>`;
          }
        });
      }
    });

    // Custom checkbox functionality
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const svg = this.parentNode.querySelector('svg');
        if (this.checked) {
          svg.classList.remove('opacity-0');
          svg.classList.add('opacity-100');
        } else {
          svg.classList.remove('opacity-100');
          svg.classList.add('opacity-0');
        }
      });
    });
  </script>
</body>
</html>