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
            'app_name' => 'SchoolPro',
            'language' => 'english',
            'name' => 'Terms of Service',
            'info' => "
            <p><strong>Andhra Educational Trust </strong></p>
            <p>School Pro - School Management App,</p>
            <p>Rajamahendravaram, Andhra Pradesh.</p>
            <p><strong>Terms of Service </strong></p>
            <p><strong>This index is designed to help you understand our Terms of Service and the performance of the services we offer. We hope this serves as a useful guide, but please ensure you read all of these terms in full.</strong></p>
            <p><strong>Welcome to SchoolPro </strong><strong>!</strong></p>
            <p><strong>Our Service</strong></p>
            <p>This section contains a description of the service, after a basic introduction, followed by the name of the service provider, and other details.</p>
            <p><strong>Agreement with School Pro </strong></p>
            <p>This section defines our agreement, which explains our relationship with you.</p>
            <p><strong>Who may use the service? </strong></p>
            <p>This section explains specific requirements for using this service, as well as the requirements for owner (or Management) permissions and the responsibilities.</p>
            <p><strong>What you need to know about this service</strong></p>
            <p>&nbsp;About the content on this service, Requirement of mobile number and email ID, it will also cover how to create a School Pro account.</p>
            <p><strong>Permissions and limitations of the service</strong></p>
            <p>This section explains your rights to use this service and the terms and conditions that apply to your use of the service. It also explains how we can make changes to the service.</p>
            <p><strong>Your content </strong></p>
            <p>This section applies to users who provide content to the Service. It defines the scope of permissions that you grant by uploading your content, and includes your agreement not to upload anything that infringes on anyone else&rsquo;s rights. It also includes information about when your content will be removed by School Pro, as well as community reports and copyright protections.</p>
            <p><strong>Account Suspension and Termination </strong></p>
            <p>This section explains how you and School Pro may termination this relationship.</p>
            <p><strong>About Software in the Service </strong></p>
            <p>This section includes details about software on the service.</p>
            <p><strong>Other Legal terms </strong></p>
            <p>This section explains our commitment to you in providing our service. It also explains that there are some things for which we are not responsible.</p>
            <p><strong>About this Agreement </strong></p>
            <p>If we make changes to these rules, what can you expect? This section contains some more important details about our agreement, including other aspects such as contract continuity.</p>
            <p><strong>Terms of Service </strong></p>
            <p><strong>Welcome to </strong><strong><u>School Pro!</u></strong></p>
            <p><strong>Our Service</strong></p>
            <p>Thank you for using the School Pro products, services and features provided to you from the platform (collectively, the &ldquo;Service&rdquo;).</p>
            <p><strong>Basic introduction</strong></p>
            <p>This service allows you to view the attendance and homework details of all classes of children studying in your school, the leave applications they provide to you, and the timetable you have set for the students, to find out the results of their exams, as well as to send necessary notices to the parents of your students and the teachers of your school, and it serves as an effective distribution platform to deliver your message in visual media.</p>
            <p>We provide information about the features of this service, as well as details on how to use them, in our Help Center. Among other things, we will also provide details on how you can connect to the Affiliate platforms such as Teacher Pro, Trainer Pro, Student Pro and Parent Pro. We will also provide you with details on how to use it on other devices such as your laptop and desktop.</p>
            <p><strong>Your service provider</strong></p>
            <p>The service provider is Andhra Educational Trust, a non-profit organization operating in the state of Andhra Pradesh under the laws of India, located at 104-4-275/1, Karthikeya Nagar, Hukumpet, Rajahmundry Rural, (533101), Andhra Pradesh.</p>
             ",
        ]);

    }
}
