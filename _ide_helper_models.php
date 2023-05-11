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
 * App\Models\Apology
 *
 * @property int $id
 * @property string|null $date
 * @property bool|null $state
 * @property string|null $reason
 * @property string|null $explan
 * @property string|null $comment
 * @property string|null $allfile
 * @property int $resident_id
 * @property int $exam_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exam|null $Exam
 * @property-read \App\Models\Resident|null $Resident
 * @method static \Illuminate\Database\Eloquent\Builder|Apology newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apology newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apology query()
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereAllfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereExplan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereResidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apology whereUpdatedAt($value)
 */
	class Apology extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Committee
 *
 * @property int $id
 * @property string|null $name
 * @property int $specialty_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Specialty $Specialty
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $Users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Committee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Committee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Committee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereSpecialtyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereUpdatedAt($value)
 */
	class Committee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cycle
 *
 * @property int $id
 * @property string $type
 * @property string $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Exam> $Exams
 * @property-read int|null $exams_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cycle whereYear($value)
 */
	class Cycle extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Deprivation
 *
 * @property int $id
 * @property string|null $reason
 * @property string|null $date
 * @property int $resident_id
 * @property int $exam_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exam|null $Exam
 * @property-read \App\Models\Resident|null $Resident
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation whereResidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deprivation whereUpdatedAt($value)
 */
	class Deprivation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Exam
 *
 * @property int $id
 * @property string $name
 * @property string $exam_date
 * @property int $specialty_id
 * @property int $cycle_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Apology> $Apologies
 * @property-read int|null $apologies_count
 * @property-read \App\Models\Cycle $Cycle
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deprivation> $Deprivations
 * @property-read int|null $deprivations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExamCenter> $ExamCenters
 * @property-read int|null $exam_centers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExamFee> $ExamFees
 * @property-read int|null $exam_fees_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resident> $Residents
 * @property-read int|null $residents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Result> $Results
 * @property-read int|null $results_count
 * @property-read \App\Models\Specialty $Specialty
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereCycleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereExamDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereSpecialtyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exam whereUpdatedAt($value)
 */
	class Exam extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExamCenter
 *
 * @property int $id
 * @property string $name
 * @property string $place
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Exam> $Exams
 * @property-read int|null $exams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Result> $Results
 * @property-read int|null $results_count
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamCenter whereUpdatedAt($value)
 */
	class ExamCenter extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ExamFee
 *
 * @property int $id
 * @property string|null $value
 * @property string|null $payment_date
 * @property string|null $receipt_number
 * @property string|null $receipt_image
 * @property int $resident_id
 * @property int $exam_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exam $Exam
 * @property-read \App\Models\Resident $Resident
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereReceiptImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereReceiptNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereResidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExamFee whereValue($value)
 */
	class ExamFee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Membership
 *
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 */
	class Membership extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Penalty
 *
 * @property int $id
 * @property string $name
 * @property string|null $count
 * @property int $residence_effect
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resident> $Residents
 * @property-read int|null $residents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specialty> $Specialties
 * @property-read int|null $specialties_count
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereResidenceEffect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Penalty whereUpdatedAt($value)
 */
	class Penalty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PreviousTraining
 *
 * @property int $id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $hospital_name
 * @property string|null $hospital_place
 * @property string|null $official_name
 * @property string|null $official_phone
 * @property string|null $official_email
 * @property string|null $pr_document
 * @property int $resident_id
 * @property int $specialty_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resident $Resident
 * @property-read \App\Models\Specialty $Specialty
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining query()
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereHospitalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereHospitalPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereOfficialEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereOfficialName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereOfficialPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining wherePrDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereResidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereSpecialtyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PreviousTraining whereUpdatedAt($value)
 */
	class PreviousTraining extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ResidenceYear
 *
 * @property int $id
 * @property string $name
 * @property string $number
 * @property string $state
 * @property string|null $comment
 * @property string $start_date
 * @property string|null $end_date
 * @property int $resident_id
 * @property int $specialty_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Resident $Resident
 * @property-read \App\Models\Specialty $Specialty
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereResidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereSpecialtyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResidenceYear whereUpdatedAt($value)
 */
	class ResidenceYear extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Resident
 *
 * @property int $id
 * @property string|null $status
 * @property string|null $name_en
 * @property string|null $father_en
 * @property string|null $mother_en
 * @property string|null $livingplace
 * @property int|null $graduation_result
 * @property string|null $graduation_year
 * @property string|null $registration_date
 * @property string|null $p_status
 * @property string|null $personal_picture
 * @property string|null $university_degree
 * @property string|null $graduation_notice
 * @property string|null $id_card
 * @property string|null $syndication_document
 * @property string|null $practicing_profession
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Apology> $Apologies
 * @property-read int|null $apologies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deprivation> $Deprivations
 * @property-read int|null $deprivations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ExamFee> $ExamFees
 * @property-read int|null $exam_fees_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Exam> $Exams
 * @property-read int|null $exams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Penalty> $Penalties
 * @property-read int|null $penalties_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreviousTraining> $PreviousTrainings
 * @property-read int|null $previous_trainings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ResidenceYear> $ResidenceYear
 * @property-read int|null $residence_year_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Result> $Results
 * @property-read int|null $results_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specialty> $Specialties
 * @property-read int|null $specialties_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\State> $States
 * @property-read int|null $states_count
 * @property-read \App\Models\User $User
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vacation> $Vacations
 * @property-read int|null $vacations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Resident newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resident newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Resident query()
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereFatherEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereGraduationNotice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereGraduationResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereGraduationYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereIdCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereLivingplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereMotherEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident wherePStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident wherePersonalPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident wherePracticingProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereRegistrationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereSyndicationDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereUniversityDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Resident whereUserId($value)
 */
	class Resident extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Result
 *
 * @property int $id
 * @property int $exam_id
 * @property int $center_id
 * @property int $resident_id
 * @property float $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Exam $Exam
 * @property-read \App\Models\ExamCenter $ExamCenters
 * @property-read \App\Models\Resident $Resident
 * @method static \Illuminate\Database\Eloquent\Builder|Result newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Result query()
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereCenterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereExamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereResidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Result whereValue($value)
 */
	class Result extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Specialty
 *
 * @property int $id
 * @property string $name
 * @property string $name_en
 * @property int $number_of_years
 * @property string $code
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Committee|null $Committee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Exam> $Exams
 * @property-read int|null $exams_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Penalty> $Penalties
 * @property-read int|null $penalties_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PreviousTraining> $PreviousTrainings
 * @property-read int|null $previous_trainings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ResidenceYear> $ResidenceYear
 * @property-read int|null $residence_year_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resident> $Residents
 * @property-read int|null $residents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\State> $States
 * @property-read int|null $states_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vacation> $Vacations
 * @property-read int|null $vacations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereNumberOfYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialty whereUpdatedAt($value)
 */
	class Specialty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\State
 *
 * @property int $id
 * @property string $name
 * @property string $new_state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resident> $Residents
 * @property-read int|null $residents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specialty> $Specialties
 * @property-read int|null $specialties_count
 * @method static \Illuminate\Database\Eloquent\Builder|State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|State query()
 * @method static \Illuminate\Database\Eloquent\Builder|State whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereNewState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|State whereUpdatedAt($value)
 */
	class State extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property bool $personal_team
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TeamInvitation> $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\TeamFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TeamInvitation
 *
 * @property int $id
 * @property int $team_id
 * @property string $email
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team $team
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUpdatedAt($value)
 */
	class TeamInvitation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property string $gender
 * @property string|null $phone
 * @property string|null $father
 * @property string|null $mother
 * @property \Illuminate\Support\Carbon|null $birthdate
 * @property string|null $birthplace
 * @property string|null $workplace
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Committee> $Committees
 * @property-read int|null $committees_count
 * @property-read \App\Models\Resident|null $Resident
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthplace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFather($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMother($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWorkplace($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Vacation
 *
 * @property int $id
 * @property string $name
 * @property string|null $maxday
 * @property string|null $maxdayinyear
 * @property bool $repetition
 * @property bool $salarydeduction
 * @property bool $recompense
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resident> $Residents
 * @property-read int|null $residents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specialty> $Specialties
 * @property-read int|null $specialties_count
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereMaxday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereMaxdayinyear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereRecompense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereRepetition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereSalarydeduction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereUpdatedAt($value)
 */
	class Vacation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Year
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Resident> $Residents
 * @property-read int|null $residents_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Specialty> $Specialties
 * @property-read int|null $specialties_count
 * @method static \Illuminate\Database\Eloquent\Builder|Year newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Year newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Year query()
 */
	class Year extends \Eloquent {}
}

