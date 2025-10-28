<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Career Application Response</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #0B1B48;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            margin: 10px 0;
        }
        .status-accepted {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .message-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #0B1B48;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0B1B48;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            margin: 10px 0;
        }
        .btn:hover {
            background-color: #cfa40c;
            color: #0B1B48;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Never Forget</h1>
        <h2>Career Application</h2>
    </div>
    
    <div class="content">
        <p>Dear Sir,</p>
        
        
        <table class="table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><strong>Employer</strong></td>
                        <td>{{ $details['body']['employer'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Position applying for</strong></td>
                        <td>{{ $details['body']['position_for_applying'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{ $details['body']['name'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{ $details['body']['city'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>State</strong></td>
                        <td>{{ $details['body']['state'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Zip</strong></td>
                        <td>{{ $details['body']['zip'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Street Address and/or Mailing Address</strong></td>
                        <td>{{ $details['body']['street_or_email_address'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Home Telephone Number</strong></td>
                        <td>{{ $details['body']['home_phone_number'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Business Telephone Number</strong></td>
                        <td>{{ $details['body']['business_phone_number'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Cellular Telephone Number</strong></td>
                        <td>{{ $details['body']['cell_number'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Date you can start work</strong></td>
                        <td>{{ $details['body']['start_work_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Salary Desired</strong></td>
                        <td>{{ $details['body']['salary_desired'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Do you have a High School Diploma or GED?</strong></td>
                        <td>{{ $details['body']['high_school_diploma'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hours</strong></td>
                        <td>{{ $details['body']['hourshours'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Shift</strong></td>
                        <td>{{ $details['body']['shift'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong></td>
                        <td>{{ $details['body']['shift_status'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Are you authorized to work in the U.S. on an unrestricted basis?</strong></td>
                        <td>{{ $details['body']['authorized_work'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Have you ever been convicted of a felony? (Convictions will not necessarily disqualify an applicant for employment.)</strong></td>
                        <td>{{ $details['body']['convicted'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Have you been told the essential functions of the job or have you been viewed a copy of the job description listing the essential functions of the job?</strong></td>
                        <td>{{ $details['body']['essential_function'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Can you perform these essential functions of the job with or without reasonable accommodation?</strong></td>
                        <td>{{ $details['body']['accommodation'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>School Name</strong></td>
                        <td>{{ $details['body']['school_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Degree</strong></td>
                        <td>{{ $details['body']['degree_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address / City / State</strong></td>
                        <td>{{ $details['body']['address_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>School Name</strong></td>
                        <td>{{ $details['body']['school_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Degree</strong></td>
                        <td>{{ $details['body']['degree_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address / City / State</strong></td>
                        <td>{{ $details['body']['address_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Other School Name</strong></td>
                        <td>{{ $details['body']['other_school'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Other Degree</strong></td>
                        <td>{{ $details['body']['other_degree'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Other Address / City / State</strong></td>
                        <td>{{ $details['body']['other_address'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Special Skills</strong></td>
                        <td>{{ $details['body']['special_skills'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{ $details['body']['name_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address/City/State</strong></td>
                        <td>{{ $details['body']['address_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>{{ $details['body']['phone_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Relationship</strong></td>
                        <td>{{ $details['body']['relation_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{ $details['body']['name_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address/City/State</strong></td>
                        <td>{{ $details['body']['address_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>{{ $details['body']['phone_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Relationship</strong></td>
                        <td>{{ $details['body']['relation_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{ $details['body']['name_3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Address/City/State</strong></td>
                        <td>{{ $details['body']['address_3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>{{ $details['body']['phone_3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Relationship</strong></td>
                        <td>{{ $details['body']['relation_3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Start Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job1_start_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>End Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job1_end_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Company Name</strong></td>
                        <td>{{ $details['body']['company_name_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Supervisor’s Name</strong></td>
                        <td>{{ $details['body']['supervisor_name1'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Phone Number</strong></td>
                        <td>{{ $details['body']['phone_number1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{ $details['body']['city_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>State</strong></td>
                        <td>{{ $details['body']['state1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Zip</strong></td>
                        <td>{{ $details['body']['zip1'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Duties</strong></td>
                        <td>{{ $details['body']['duties1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Reason for Leaving</strong></td>
                        <td>{{ $details['body']['reason_for_leaving_1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Starting Salary</strong></td>
                        <td>{{ $details['body']['starting_salary1'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ending Salary</strong></td>
                        <td>{{ $details['body']['ending_salary1'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>May we contact your present employer?</strong></td>
                        <td>{{ $details['body']['contact_present_employer'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Start Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job2_start_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>End Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job2_end_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Company Name</strong></td>
                        <td>{{ $details['body']['company_name_2'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Supervisor’s Name</strong></td>
                        <td>{{ $details['body']['supervisor_name2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number</strong></td>
                        <td>{{ $details['body']['phone_number2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{ $details['body']['city_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>State</strong></td>
                        <td>{{ $details['body']['state2'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Zip</strong></td>
                        <td>{{ $details['body']['zip2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Duties</strong></td>
                        <td>{{ $details['body']['duties2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Reason for Leaving</strong></td>
                        <td>{{ $details['body']['reason_for_leaving_2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Starting Salary</strong></td>
                        <td>{{ $details['body']['starting_salary2'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Ending Salary</strong></td>
                        <td>{{ $details['body']['ending_salary2'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Start Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job3_start_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>End Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job3_end_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Company Name</strong></td>
                        <td>{{ $details['body']['company_name_3'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Supervisor’s Name</strong></td>
                        <td>{{ $details['body']['supervisor_name3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number</strong></td>
                        <td>{{ $details['body']['phone_number3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{ $details['body']['city_3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>State</strong></td>
                        <td>{{ $details['body']['state3'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Zip</strong></td>
                        <td>{{ $details['body']['zip3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Duties</strong></td>
                        <td>{{ $details['body']['duties3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Reason for Leaving</strong></td>
                        <td>{{ $details['body']['reason_for_leaving_3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Starting Salary</strong></td>
                        <td>{{ $details['body']['starting_salary3'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Ending Salary</strong></td>
                        <td>{{ $details['body']['ending_salary3'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Start Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job4_start_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>End Date (mo/day/yr)</strong></td>
                        <td>{{ $details['body']['job4_end_date'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Company Name</strong></td>
                        <td>{{ $details['body']['company_name_4'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Supervisor’s Name</strong></td>
                        <td>{{ $details['body']['supervisor_name4'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone Number</strong></td>
                        <td>{{ $details['body']['phone_number4'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{ $details['body']['city_4'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>State</strong></td>
                        <td>{{ $details['body']['state4'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Zip</strong></td>
                        <td>{{ $details['body']['zip4'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Employer</strong></td>
                        <td>{{ $details['body']['employer'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Duties</strong></td>
                        <td>{{ $details['body']['duties4'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Reason for Leaving</strong></td>
                        <td>{{ $details['body']['reason_for_leaving_4'] ?? '—' }}</td>
                    </tr><tr>
                        <td><strong>Starting Salary</strong></td>
                        <td>{{ $details['body']['starting_salary4'] ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ending Salary</strong></td>
                        <td>{{ $details['body']['ending_salary4'] ?? '—' }}</td>
                    </tr>
            </tbody>
        </table>
        
        <p>If you have any questions, please don't hesitate to contact us.</p>
        
        <p>Best regards,<br>
        <strong>The Never Forget Team</strong></p>
    </div>
    
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
        <p>© {{ date('Y') }} Never Forget. All rights reserved.</p>
    </div>
</body>
</html>
