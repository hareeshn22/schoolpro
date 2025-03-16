<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Page::create([
            'app_name'  => 'SchoolPro',
            'name'      => 'Terms of Service',
            'content'   => "

                **1. Introduction**

                Welcome to the SchoolPro App (the \"App\"). This App is operated by [Your Company Name] (\"we,\" \"our,\" or \"us\"). By using our App, you agree to these Terms of Service (\"Terms\"). Please read them carefully.

                **2. Acceptance of Terms**

                By accessing or using our App, you agree to comply with and be bound by these Terms and all applicable laws and regulations. If you do not agree to these Terms, you may not use our App.

                **3. Changes to Terms**

                We reserve the right to modify these Terms at any time. Any changes will be effective immediately upon posting the revised Terms on the App. Your continued use of the App following the posting of changes constitutes your acceptance of such changes.

                **4. Use of the App**

                a. **Eligibility:** You must be at least [age] years old to use our App.

                b. **Account Registration:** To access certain features of the App, you may need to create an account. You agree to provide accurate and complete information during the registration process and maintain the confidentiality of your account information, including your password.

                c. **Prohibited Conduct:** You agree not to use the App for any unlawful or prohibited activities, including but not limited to:
                - Violating any applicable laws or regulations.
                - Posting or transmitting any harmful, threatening, or offensive content.
                - Attempting to gain unauthorized access to the App or other users' accounts.

                **5. Intellectual Property**

                All content, features, and functionality on the App, including text, graphics, logos, and software, are the exclusive property of [Your Company Name] and are protected by copyright, trademark, and other intellectual property laws.

                **6. Privacy Policy**

                Your use of the App is also governed by our Privacy Policy, which is incorporated into these Terms by reference. Please review our Privacy Policy to understand our practices regarding your personal data.

                **7. User Responsibilities**

                a. **Security:** Users are responsible for maintaining the confidentiality of their account information, including their password, and for any activities that occur under their account.

                b. **Content:** Users are responsible for any content they post or submit through the App. By posting content, users grant us a non-exclusive, royalty-free, perpetual, and worldwide license to use, reproduce, modify, and distribute such content.

                **8. Third-Party Links**

                The App may contain links to third-party websites or services that are not owned or controlled by us. We are not responsible for the content, privacy policies, or practices of any third-party websites or services. Users should review the terms and privacy policies of those websites before using them.

                **9. User Feedback**

                We welcome and encourage users to provide feedback, comments, and suggestions to improve the App. By submitting feedback, users agree that we may use and share such feedback for any purpose without compensation or acknowledgment.

                **10. Termination**

                We reserve the right to terminate or suspend your access to the App at any time, with or without cause, and with or without notice.

                **11. Disclaimer of Warranties**

                The App is provided \"as is\" and \"as available\" without warranties of any kind, either express or implied. We do not warrant that the App will be uninterrupted, error-free, or free of viruses or other harmful components.

                **12. Limitation of Liability**

                In no event shall [Your Company Name] be liable for any direct, indirect, incidental, special, consequential, or punitive damages arising out of or in connection with your use of the App.

                **13. Indemnification**

                Users agree to indemnify and hold us harmless from any claims, losses, liabilities, damages, and expenses (including legal fees) arising out of their use of the App, violation of these Terms, or infringement of any rights of another party.

                **14. Severability**

                If any provision of these Terms is found to be invalid or unenforceable, the remaining provisions will continue to be valid and enforceable to the fullest extent permitted by law.

                **15. Entire Agreement**

                These Terms, together with our Privacy Policy, constitute the entire agreement between users and us regarding the use of the App and supersede any prior agreements or understandings, whether written or oral.

                **16. No Waiver**

                Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights.

                **17. Governing Law**

                These Terms shall be governed by and construed in accordance with the laws of [Your Jurisdiction], without regard to its conflict of law principles.

                **18. Contact Information**

                If you have any questions or concerns about these Terms, please contact us at [Your Contact Information].
            ",
        ]);

    }
}
