<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Announcement
 *
 * @property int $id
 * @property string $title
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $summary
 * @property string|null $description
 * @property int|null $company_id
 * @property int|null $department_id
 * @property int|null $added_by
 * @property int $is_notify
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $announcer
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\Department|null $department
 * @method static \Database\Factories\AnnouncementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereAddedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereIsNotify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUpdatedAt($value)
 */
	class Announcement extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Award
 *
 * @property int $id
 * @property string|null $award_information
 * @property string $award_date
 * @property string|null $gift
 * @property string|null $cash
 * @property string|null $award_photo
 * @property int $company_id
 * @property int $department_id
 * @property int $user_id
 * @property int $award_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AwardType|null $awardType
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\Department|null $department
 * @property-read \App\Models\User|null $employee
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Award endsAfter($date)
 * @method static \Database\Factories\AwardFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Award newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Award newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Award query()
 * @method static \Illuminate\Database\Eloquent\Builder|Award relations()
 * @method static \Illuminate\Database\Eloquent\Builder|Award startsBefore($date)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereAwardDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereAwardInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereAwardPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereAwardTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereCash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereGift($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Award whereUserId($value)
 */
	class Award extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\AwardType
 *
 * @property int $id
 * @property string $award_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AwardTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AwardType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AwardType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AwardType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AwardType whereAwardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AwardType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AwardType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AwardType whereUpdatedAt($value)
 */
	class AwardType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\CityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $trading_name
 * @property string|null $registration_no
 * @property string|null $ifu
 * @property string|null $contact_no
 * @property string|null $email
 * @property string|null $website
 * @property string|null $tax_no
 * @property string|null $company_logo
 * @property int|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Announcement[] $announces
 * @property-read int|null $announces_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Award[] $awards
 * @property-read int|null $awards_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Division[] $divisions
 * @property-read int|null $divisions_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PolicyCompany[] $policy
 * @property-read int|null $policy_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StrategicalGoal[] $strategicGoal
 * @property-read int|null $strategic_goal_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\CompanyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCompanyLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereContactNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIfu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereRegistrationNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTaxNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTradingName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite($value)
 */
	class Company extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Complaint
 *
 * @property int $id
 * @property string $complaint_title
 * @property string|null $description
 * @property int $company_id
 * @property int $complaint_from
 * @property int $complaint_against
 * @property string $complaint_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\User|null $complaint_against_employee
 * @property-read \App\Models\User|null $complaint_from_employee
 * @method static \Database\Factories\ComplaintFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint query()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereComplaintAgainst($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereComplaintDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereComplaintFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereComplaintTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereUpdatedAt($value)
 */
	class Complaint extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\CountryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CustomLeavePolicy
 *
 * @property int $id
 * @property string $name
 * @property int $num_days
 * @property int|null $user_id
 * @property int|null $leave_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LeaveType|null $LeaveType
 * @property-read \App\Models\User|null $users
 * @method static \Database\Factories\CustomLeavePolicyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy query()
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy whereLeaveTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy whereNumDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CustomLeavePolicy whereUserId($value)
 */
	class CustomLeavePolicy extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $department
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Announcement[] $announces
 * @property-read int|null $announces_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Designation[] $designations
 * @property-read int|null $designations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TacticalGoal[] $tacticalGoals
 * @property-read int|null $tactical_goals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\DepartmentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Department whereUpdatedAt($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Designation
 *
 * @property int $id
 * @property int|null $department_id
 * @property string $designation
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department|null $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\DesignationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Designation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Designation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Designation whereUpdatedAt($value)
 */
	class Designation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Diploma
 *
 * @property int $id
 * @property string $name
 * @property string $institution
 * @property string $years
 * @property string $diplomas
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\DiplomaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereDiplomas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diploma whereYears($value)
 */
	class Diploma extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Division
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $telephone
 * @property int $location_manager
 * @property int $company_id
 * @property int $country_id
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\User|null $manager
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\DivisionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereLocationManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 */
	class Division extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EventCalendar
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property int $days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\EventCalendarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventCalendar whereUserId($value)
 */
	class EventCalendar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Experience
 *
 * @property int $id
 * @property string $name
 * @property string $institution
 * @property string $start_date
 * @property string $end_date
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ExperienceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUserId($value)
 */
	class Experience extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Holidays
 *
 * @property int $id
 * @property string $name
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\HolidaysFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays query()
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Holidays whereUpdatedAt($value)
 */
	class Holidays extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LeaveType
 *
 * @property int $id
 * @property string|null $code
 * @property string $name
 * @property string $description
 * @property int $earned_leave
 * @property int $carry_forward
 * @property int $number_days
 * @property int $max
 * @property int $status
 * @property string $applicable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CustomLeavePolicy[] $customLeavePolicy
 * @property-read int|null $custom_leave_policy_count
 * @method static \Database\Factories\LeaveTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereApplicable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereCarryForward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereEarnedLeave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereNumberDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveType whereUpdatedAt($value)
 */
	class LeaveType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PolicyCompany
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\PolicyCompanyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany query()
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PolicyCompany whereUpdatedAt($value)
 */
	class PolicyCompany extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Profile_Doc
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $filePath
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile_Doc whereUserId($value)
 */
	class Profile_Doc extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Promotion
 *
 * @property int $id
 * @property string $promotion_title
 * @property string|null $description
 * @property int $company_id
 * @property int $user_id
 * @property string $promotion_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\User|null $employee
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion endsAfter($date)
 * @method static \Database\Factories\PromotionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion filter(array $data, ?array $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion paginateFilter(?int $perPage = null, array $columns = [], string $pageName = 'page', ?int $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion simplePaginateFilter(?int $perPage = null, array $columns = [], string $pageName = 'page', ?int $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion startsBefore($date)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion wherePromotionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion wherePromotionTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereUserId($value)
 */
	class Promotion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Resignation
 *
 * @property int $id
 * @property string|null $description
 * @property int|null $company_id
 * @property int|null $department_id
 * @property int|null $user_id
 * @property string|null $notice_date
 * @property string $resignation_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\Department|null $department
 * @property-read \App\Models\User|null $employee
 * @method static \Database\Factories\ResignationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereNoticeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereResignationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resignation whereUserId($value)
 */
	class Resignation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StrategicalGoal
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property string $start_year
 * @property string $end_year
 * @property int $weight
 * @property int|null $company_id
 * @property \App\Models\User|null $responsible
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\StrategicalIndicator[] $strategicalIndicator
 * @property-read int|null $strategical_indicator_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TacticalGoal[] $tacticalGoals
 * @property-read int|null $tactical_goals_count
 * @method static \Database\Factories\StrategicalGoalFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal query()
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereEndYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereResponsible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereStartYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalGoal whereWeight($value)
 */
	class StrategicalGoal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\StrategicalIndicator
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property int $strategical_goal_id
 * @property int $weight
 * @property \App\Models\User|null $responsible
 * @property string $status
 * @property string $trust
 * @property int $init_value
 * @property int $target
 * @property int $current_value
 * @property int $progress
 * @property string $comments
 * @property string $next_step
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\StrategicalGoal $strategicalGoal
 * @method static \Database\Factories\StrategicalIndicatorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator query()
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereCurrentValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereInitValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereNextStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereResponsible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereStrategicalGoalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereTrust($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StrategicalIndicator whereWeight($value)
 */
	class StrategicalIndicator extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TacticalGoal
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property string $type
 * @property string $start_date
 * @property string $end_date
 * @property int $weight
 * @property int $department_id
 * @property int $strategical_goal_id
 * @property \App\Models\User|null $responsible
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department|null $department
 * @property-read \App\Models\StrategicalGoal $strategicalGoal
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TacticalIndicator[] $tacticalIndicators
 * @property-read int|null $tactical_indicators_count
 * @method static \Database\Factories\TacticalGoalFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal query()
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereResponsible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereStrategicalGoalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalGoal whereWeight($value)
 */
	class TacticalGoal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TacticalIndicator
 *
 * @property int $id
 * @property string $code
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property int $tactical_goal_id
 * @property int $weight
 * @property \App\Models\User|null $responsible
 * @property string $status
 * @property string $trust
 * @property int $init_value
 * @property int $target
 * @property int $current_value
 * @property int $progress
 * @property string $comments
 * @property string $next_step
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TacticalGoal $tacticalGoal
 * @method static \Database\Factories\TacticalIndicatorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator query()
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereCurrentValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereInitValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereNextStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereResponsible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereTacticalGoalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereTrust($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TacticalIndicator whereWeight($value)
 */
	class TacticalIndicator extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property int $department_id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TeamMember[] $teamMembers
 * @property-read int|null $team_members_count
 * @method static \Database\Factories\TeamFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TeamMember
 *
 * @property int $id
 * @property int $user_id
 * @property int $team_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\Team $team
 * @method static \Database\Factories\TeamMemberFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamMember whereUserId($value)
 */
	class TeamMember extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Termination
 *
 * @property int $id
 * @property string|null $description
 * @property int $company_id
 * @property int $terminated_employee
 * @property int|null $termination_type
 * @property string $termination_date
 * @property string $notice_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TerminationType|null $TerminationType
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\User|null $employee
 * @method static \Database\Factories\TerminationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Termination newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Termination query()
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereNoticeDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereTerminatedEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereTerminationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereTerminationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Termination whereUpdatedAt($value)
 */
	class Termination extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TerminationType
 *
 * @property int $id
 * @property string $termination_title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TerminationTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TerminationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminationType whereTerminationTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TerminationType whereUpdatedAt($value)
 */
	class TerminationType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Trainer
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $picture_url
 * @property string $contact
 * @property string $expertise
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Training|null $training
 * @method static \Database\Factories\TrainerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereExpertise($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer wherePictureUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trainer whereUpdatedAt($value)
 */
	class Trainer extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Training
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $trainer_id
 * @property int|null $training_list_id
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\TrainingList|null $skill
 * @property-read \App\Models\Trainer|null $trainer
 * @method static \Illuminate\Database\Eloquent\Builder|Training endsAfter($date)
 * @method static \Database\Factories\TrainingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Training newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training query()
 * @method static \Illuminate\Database\Eloquent\Builder|Training startsBefore($date)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereTrainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereTrainingListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Training whereUserId($value)
 */
	class Training extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TrainingList
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TrainingListFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingList query()
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TrainingList whereUpdatedAt($value)
 */
	class TrainingList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transfert
 *
 * @property int $id
 * @property string|null $description
 * @property int|null $company_id
 * @property int|null $from_department_id
 * @property int|null $to_department_id
 * @property int|null $user_id
 * @property string $transfer_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\Department|null $from_department
 * @property-read \App\Models\Department|null $to_department
 * @method static \Database\Factories\TransfertFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereFromDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereToDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereTransferDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfert whereUserId($value)
 */
	class Transfert extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Travel
 *
 * @property int $id
 * @property string|null $description
 * @property int $company_id
 * @property int $user_id
 * @property int|null $travel_type
 * @property string $start_date
 * @property string $end_date
 * @property string|null $purpose_of_visit
 * @property string|null $place_of_visit
 * @property string|null $expected_budget
 * @property string|null $actual_budget
 * @property \App\Enums\v1\Travel\TravelModeEnum $travel_mode
 * @property \App\Enums\v1\Travel\TravelStatusEnum $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\TravelType|null $travelType
 * @method static \Database\Factories\TravelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Travel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Travel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereActualBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereExpectedBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel wherePlaceOfVisit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel wherePurposeOfVisit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereTravelMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereTravelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Travel whereUserId($value)
 */
	class Travel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TravelType
 *
 * @property int $id
 * @property string $arrangement_type
 * @property int|null $company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TravelTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType whereArrangementType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TravelType whereUpdatedAt($value)
 */
	class TravelType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $avatar
 * @property string|null $phone
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read int|null $actions_count
 * @property-read int|null $activities_count
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection|Role[] $roles
 * @property-read int|null $roles_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read UserProfile|null $userProfile
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property int|null $city_id
 * @property int|null $country_id
 * @property int|null $designation_id
 * @property int|null $department_id
 * @property int|null $division_id
 * @property int|null $company_id
 * @property int|null $supervisor_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Announcement[] $announcements
 * @property-read int|null $announcements_count
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\CustomLeavePolicy|null $customLeavePolicy
 * @property-read \App\Models\Department|null $department
 * @property-read \App\Models\Designation|null $designation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Diploma[] $diplomas
 * @property-read int|null $diplomas_count
 * @property-read \App\Models\Division|null $division
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Profile_Doc[] $docs
 * @property-read int|null $docs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventCalendar[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Experience[] $experiences
 * @property-read int|null $experiences_count
 * @property-read \Yungts97\LaravelUserActivityLog\Models\Log|null $log
 * @property-read \Illuminate\Database\Eloquent\Collection|\Yungts97\LaravelUserActivityLog\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read User|null $supervisor
 * @property-read \App\Models\Team $team
 * @property-read \App\Models\Training|null $training
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(array $data, ?array $filters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User paginateFilter(?int $perPage = null, array $columns = [], string $pageName = 'page', ?int $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User relations()
 * @method static \Illuminate\Database\Eloquent\Builder|User simplePaginateFilter(?int $perPage = null, array $columns = [], string $pageName = 'page', ?int $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDesignationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSupervisorId($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail, \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\UserProfile
 *
 * @property-read User|null $user
 * @method static \Database\Factories\UserProfileFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @mixin Eloquent
 * @property int $id
 * @property string|null $employeeID
 * @property int $user_id
 * @property string|null $father_name
 * @property string|null $mother_name
 * @property string|null $spouse_name
 * @property string|null $nationality
 * @property string|null $num_cnss
 * @property string|null $blood_type
 * @property string|null $id_name
 * @property string|null $id_number
 * @property string|null $phone_two
 * @property string|null $emergency_contact
 * @property string $gender
 * @property string|null $marital_status
 * @property string|null $date_of_birth
 * @property string|null $ifu
 * @property string|null $date_hired
 * @property string|null $exit_date
 * @property int|null $total_leave
 * @property int|null $remaining_leave
 * @property int $active
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereBloodType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereDateHired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereEmergencyContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereEmployeeID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereExitDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereFatherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereIdName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereIfu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMaritalStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereMotherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereNumCnss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile wherePhoneTwo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereRemainingLeave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereSpouseName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereTotalLeave($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 */
	class UserProfile extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Warning
 *
 * @property int $id
 * @property string $subject
 * @property string|null $description
 * @property int $company_id
 * @property int $warning_to
 * @property int|null $warning_type
 * @property string $warning_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $WarningTo
 * @property-read \App\Models\WarningType|null $WarningType
 * @property-read \App\Models\Company|null $company
 * @method static \Database\Factories\WarningFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warning newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warning query()
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereWarningDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereWarningTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warning whereWarningType($value)
 */
	class Warning extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\WarningType
 *
 * @property int $id
 * @property string $warning_title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\WarningTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningType query()
 * @method static \Illuminate\Database\Eloquent\Builder|WarningType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WarningType whereWarningTitle($value)
 */
	class WarningType extends \Eloquent {}
}

