@extends('admin.layout')

@section('page_title', 'Email Test Tool')
@section('page_subtitle', 'Test email delivery and configuration.')

@section('content')
    <div class="space-y-6">
        @if (session('status'))
            <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                {{ session('error') }}
            </div>
        @endif

        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <div class="mb-6">
                <h2 class="text-xl font-bold text-white mb-2">Send Test Email</h2>
                <p class="text-sm text-slate-400">Test your email configuration by sending a test email to any address.</p>
            </div>

            <form method="POST" action="{{ route('admin.email-test.test') }}" class="space-y-6">
                @csrf

                <div class="grid gap-6 md:grid-cols-2">
                    <div class="rounded-xl border border-slate-800 bg-slate-950/70 p-6 space-y-4">
                        <h3 class="text-base font-bold text-white">Email Configuration</h3>
                        
                        <div>
                            <label class="text-sm text-slate-400 mb-2 block">From Address</label>
                            <input 
                                type="text" 
                                value="{{ config('mail.from.address') }}" 
                                disabled
                                class="w-full rounded-xl bg-slate-900 border border-slate-800 px-4 py-2 text-sm text-slate-400"
                            />
                        </div>

                        <div>
                            <label class="text-sm text-slate-400 mb-2 block">From Name</label>
                            <input 
                                type="text" 
                                value="{{ config('mail.from.name', 'StagePass Admin') }}" 
                                disabled
                                class="w-full rounded-xl bg-slate-900 border border-slate-800 px-4 py-2 text-sm text-slate-400"
                            />
                        </div>

                        <div>
                            <label class="text-sm text-slate-400 mb-2 block">Mail Driver</label>
                            <input 
                                type="text" 
                                value="{{ config('mail.default') }}" 
                                disabled
                                class="w-full rounded-xl bg-slate-900 border border-slate-800 px-4 py-2 text-sm text-slate-400"
                            />
                        </div>

                        @if (config('mail.default') === 'smtp')
                            <div>
                                <label class="text-sm text-slate-400 mb-2 block">SMTP Host</label>
                                <input 
                                    type="text" 
                                    value="{{ config('mail.mailers.smtp.host') }}" 
                                    disabled
                                    class="w-full rounded-xl bg-slate-900 border border-slate-800 px-4 py-2 text-sm text-slate-400"
                                />
                            </div>

                            <div>
                                <label class="text-sm text-slate-400 mb-2 block">SMTP Port</label>
                                <input 
                                    type="text" 
                                    value="{{ config('mail.mailers.smtp.port') }}" 
                                    disabled
                                    class="w-full rounded-xl bg-slate-900 border border-slate-800 px-4 py-2 text-sm text-slate-400"
                                />
                            </div>
                        @endif
                    </div>

                    <div class="rounded-xl border border-slate-800 bg-slate-950/70 p-6 space-y-4">
                        <h3 class="text-base font-bold text-white">Test Email Details</h3>
                        
                        <div>
                            <label for="to_email" class="text-sm text-slate-400 mb-2 block">To Email Address *</label>
                            <input 
                                type="email" 
                                id="to_email"
                                name="to_email" 
                                value="{{ old('to_email', 'info@stagepass.co.ke') }}"
                                required
                                class="w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500/50"
                                placeholder="recipient@example.com"
                            />
                            <p class="text-xs text-slate-500 mt-1">Enter the email address to send the test email to.</p>
                        </div>

                        <div>
                            <label for="subject" class="text-sm text-slate-400 mb-2 block">Subject *</label>
                            <input 
                                type="text" 
                                id="subject"
                                name="subject" 
                                value="{{ old('subject', 'Test Email from StagePass Admin') }}"
                                required
                                class="w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500/50"
                                placeholder="Test Email Subject"
                            />
                        </div>

                        <div>
                            <label for="message" class="text-sm text-slate-400 mb-2 block">Test Message *</label>
                            <textarea 
                                id="message"
                                name="message" 
                                rows="4"
                                required
                                class="w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100 focus:outline-none focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500/50"
                                placeholder="Enter your test message here..."
                            >{{ old('message', 'This is a test email to verify email delivery is working correctly.') }}</textarea>
                        </div>

                        <div class="flex items-center gap-3">
                            <input 
                                type="checkbox" 
                                id="include_bcc"
                                name="include_bcc" 
                                value="1"
                                {{ old('include_bcc') ? 'checked' : '' }}
                                class="w-4 h-4 rounded bg-slate-950 border-slate-800 text-yellow-500 focus:ring-yellow-500/50"
                            />
                            <label for="include_bcc" class="text-sm text-slate-300">
                                Include BCC to albertmuhatia@gmail.com
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-slate-800">
                    <p class="text-xs text-slate-500">
                        <strong>Note:</strong> Make sure your email configuration in <code class="text-slate-400">.env</code> is correct before testing.
                    </p>
                    <button 
                        type="submit"
                        class="px-6 py-3 rounded-xl bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition"
                    >
                        Send Test Email
                    </button>
                </div>
            </form>
        </div>

        <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
            <h2 class="text-xl font-bold text-white mb-4">Email Configuration Help</h2>
            <div class="space-y-4 text-sm text-slate-400">
                <div>
                    <h3 class="text-base font-semibold text-white mb-2">Common Email Drivers</h3>
                    <ul class="list-disc list-inside space-y-1 ml-4">
                        <li><strong>SMTP:</strong> For most email providers (Gmail, Outlook, custom SMTP)</li>
                        <li><strong>Mailgun:</strong> For Mailgun service</li>
                        <li><strong>SES:</strong> For Amazon SES</li>
                        <li><strong>Sendmail:</strong> For server's sendmail command</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-white mb-2">Troubleshooting</h3>
                    <ul class="list-disc list-inside space-y-1 ml-4">
                        <li>Check your <code class="text-slate-300">.env</code> file for correct email settings</li>
                        <li>Verify SMTP credentials if using SMTP driver</li>
                        <li>Check server logs: <code class="text-slate-300">storage/logs/laravel.log</code></li>
                        <li>Ensure firewall allows outbound SMTP connections (port 25, 587, or 465)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
