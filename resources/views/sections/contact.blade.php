@php
    $section = $data['section'] ?? null;
    $details = $data['details'] ?? [];
    $badgeLabel = $section['badge_label'] ?? 'Get In Touch';
    $title = $section['title'] ?? "Let's Create Something Amazing Together";
    $description = $section['description'] ?? 'Ready to elevate your next event? Contact us today for a quote or consultation.';
@endphp

<section id="contact" class="py-32 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-20 left-0 w-[700px] h-[700px] bg-yellow-100 rounded-full blur-3xl opacity-30 animate-pulse-slow"></div>
    <div class="absolute bottom-0 right-0 w-[700px] h-[700px] bg-[#172455] rounded-full blur-3xl opacity-5 animate-pulse-slower"></div>
    
    <div class="container mx-auto px-6 lg:px-12 relative z-10">
        <div class="grid lg:grid-cols-2 gap-20">
            <!-- Left - Contact Info -->
            <div class="space-y-10 animate-slide-in-left">
                <div>
                    <span class="text-sm font-bold text-yellow-600 tracking-wider uppercase bg-yellow-100 px-4 py-2 rounded-full">{{ $badgeLabel }}</span>
                    <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8 leading-tight">{{ $title }}</h2>
                    <div class="h-2 w-24 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mb-8"></div>
                    <p class="text-xl text-gray-700 font-medium">{{ $description }}</p>
                </div>

                <div class="space-y-6">
                    @foreach($details as $detail)
                        @php
                            $isBlueGradient = $detail['icon'] === 'Phone' || $detail['icon'] === 'Clock';
                            $iconColor = $isBlueGradient ? 'text-yellow-400' : 'text-white';
                        @endphp
                        <div class="flex items-start space-x-5 group">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $isBlueGradient ? 'from-[#172455] to-[#1e3a8a]' : 'from-yellow-400 to-yellow-600' }} rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                @if($detail['icon'] === 'Phone')
                                    <svg class="{{ $iconColor }} w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                @elseif($detail['icon'] === 'Mail')
                                    <svg class="{{ $iconColor }} w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                @elseif($detail['icon'] === 'MapPin')
                                    <svg class="{{ $iconColor }} w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                @elseif($detail['icon'] === 'Clock')
                                    <svg class="{{ $iconColor }} w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                @else
                                    <svg class="{{ $iconColor }} w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <h3 class="font-black text-[#172455] mb-2 text-lg">{{ $detail['label'] ?? '' }}</h3>
                                <p class="text-gray-700 font-medium whitespace-pre-line">{{ $detail['value'] ?? '' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right - Contact Form -->
            <div class="bg-gradient-to-br from-white to-gray-50 rounded-3xl shadow-2xl p-10 lg:p-14 border-2 border-gray-100 animate-slide-in-right">
                <form id="contact-form" onsubmit="handleContactSubmit(event)" class="space-y-6">
                    <div id="contact-error" class="hidden rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"></div>
                    
                    <div>
                        <label class="block text-sm font-bold text-[#172455] mb-3">Full Name</label>
                        <input type="text" name="name" required class="w-full h-14 text-base border-2 border-gray-200 focus:border-yellow-500 rounded-xl px-4" placeholder="John Doe" />
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-[#172455] mb-3">Email Address</label>
                        <input type="email" name="email" required class="w-full h-14 text-base border-2 border-gray-200 focus:border-yellow-500 rounded-xl px-4" placeholder="john@example.com" />
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-[#172455] mb-3">Phone Number</label>
                        <input type="tel" name="phone" required class="w-full h-14 text-base border-2 border-gray-200 focus:border-yellow-500 rounded-xl px-4" placeholder="+254 700 000 000" />
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-[#172455] mb-3">Message</label>
                        <textarea name="message" rows="5" required class="w-full text-base border-2 border-gray-200 focus:border-yellow-500 rounded-xl px-4 py-3" placeholder="Tell us about your event..."></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-[#172455] mb-3">
                            Quick check: <span id="contact-math-challenge">2 + 3</span> = ?
                        </label>
                        <input type="number" name="mathAnswer" required class="w-full h-14 text-base border-2 border-gray-200 focus:border-yellow-500 rounded-xl px-4" placeholder="Your answer" />
                    </div>
                    
                    <div style="display: none;">
                        <input type="text" name="honeypot" />
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-[#172455] to-[#1e3a8a] hover:from-[#0f1b3d] hover:to-[#172455] text-white py-7 text-lg rounded-full shadow-2xl hover:shadow-yellow-500/50 transition-all duration-300 hover:scale-105 font-bold">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
let contactMathChallenge = { a: 2, b: 3 };

function generateContactMathChallenge() {
    contactMathChallenge.a = Math.floor(Math.random() * 8) + 2;
    contactMathChallenge.b = Math.floor(Math.random() * 8) + 2;
    document.getElementById('contact-math-challenge').textContent = `${contactMathChallenge.a} + ${contactMathChallenge.b}`;
}

generateContactMathChallenge();

function handleContactSubmit(e) {
    e.preventDefault();
    const errorDiv = document.getElementById('contact-error');
    errorDiv.classList.add('hidden');
    
    const formData = new FormData(e.target);
    const expectedAnswer = contactMathChallenge.a + contactMathChallenge.b;
    const userAnswer = parseInt(formData.get('mathAnswer'));
    
    if (userAnswer !== expectedAnswer) {
        errorDiv.textContent = 'Please solve the math challenge correctly.';
        errorDiv.classList.remove('hidden');
        return;
    }
    
    if (formData.get('honeypot')) {
        return;
    }
    
    fetch('{{ url("/api/contact/submit") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            name: formData.get('name'),
            email: formData.get('email'),
            phone: formData.get('phone'),
            message: formData.get('message'),
            math_answer: userAnswer,
            math_challenge: `${contactMathChallenge.a}+${contactMathChallenge.b}`,
            honeypot: formData.get('honeypot'),
            form_timestamp: Math.floor(Date.now() / 1000),
        }),
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('Message sent successfully!');
            e.target.reset();
            generateContactMathChallenge();
        } else {
            errorDiv.textContent = data.message || 'Failed to send message.';
            errorDiv.classList.remove('hidden');
            generateContactMathChallenge();
        }
    })
    .catch(err => {
        errorDiv.textContent = 'An error occurred. Please try again.';
        errorDiv.classList.remove('hidden');
        generateContactMathChallenge();
    });
}
</script>
