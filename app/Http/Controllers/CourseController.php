<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\course_topics;

use Illuminate\Support\Facades\Validator;
use App\Models\videos;
use App\Models\user_courses;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = Course::all();
        return view('admin.add_courses',);
    }
    public function all()
    {
        return view('admin.all_courses');
    }

    public function active()
    {
        return view('admin.courses_active');
    }

    public function suspended()
    {
        return view('admin.courses_suspended');
    }

    public function approve($id)
    {
        $userCourse = user_courses::findOrFail($id);
        $userCourse->status = 'yes';
        $userCourse->save();
        return redirect()->back()->with('success', 'تم قبول طلب الشراء بنجاح');
    }

    public function reject($id)
    {
        $userCourse = user_courses::findOrFail($id);
        $userCourse->status = 'rejected';
        $userCourse->save();
        return redirect()->back()->with('success', 'تم رفض طلب الشراء');
    }
// ----------------------------------------- talab chira2 cours ---------------------
    // public function enroll($id)
    // {
    //     $course = Course::findOrFail($id);
    //     $user_course = new user_courses();
    //     $user_course->user_id = auth()->user()->id;
    //     $user_course->course_id = $course->id;
    //     $user_course->status = 'no';
    //     $user_course->save();
    //     return redirect()->back()->with('success', 'تم تقديم طلب الشراء بنجاح');
    // }
//------------------------------------------------------------------------------------
    public function rejected()
    {
        return view('admin.rejected_purchase_orders');
    }


    public function activate($id)
    {
        $course = Course::findOrFail($id);
        $course->status = 'active';
        $course->save();
        return redirect()->back()->with('success', 'تم تفعيل الدورة بنجاح');
    }

    public function my_courses()
    {
        $user_courses = user_courses::where('user_id', auth()->user()->id)
                                  ->where('status', 'yes')
                                  ->with('course')
                                  ->get();
        return view('site.my_courses', compact('user_courses'));
    }
    public function details($id)
    {
        $course = Course::findOrFail($id);
        return view('site.course-details', compact('course'));
    }

    public function allSuspended()
    {
        return view('admin.all_courses_suspended');
    }




    public function suspend($id)
    {
        $course = Course::findOrFail($id);
        $course->status = 'suspended';
        $course->save();
        return redirect()->back()->with('success', 'تم تعليق الدورة بنجاح');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {

        $messages = [
            'title_ar.required' => 'عنوان الدورة باللغة العربية مطلوب',
            'title_fr.required' => 'عنوان الدورة باللغة الفرنسية مطلوب',
            'instructor_ar.required' => 'اسم المدرب باللغة العربية مطلوب',
            'instructor_fr.required' => 'اسم المدرب باللغة الفرنسية مطلوب',
            'price.required' => 'سعر الدورة مطلوب',
            'price.numeric' => 'سعر الدورة يجب أن يكون رقماً',
            'duration.required' => 'مدة الدورة مطلوبة',
            'duration.numeric' => 'مدة الدورة يجب أن تكون رقماً',
            'description_ar.required' => 'وصف الدورة باللغة العربية مطلوب',
            'description_fr.required' => 'وصف الدورة باللغة الفرنسية مطلوب',
            'image.required' => 'صورة الدورة مطلوبة',
            'image.image' => 'يجب أن يكون الملف المرفق صورة',
            'image.mimes' => 'يجب أن تكون الصورة من نوع: jpeg, png, jpg, gif'
        ];

        $validator = Validator::make($request->all(), [
            'title_ar' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'instructor_ar' => 'required|string|max:255',
            'instructor_fr' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|numeric|min:1',
            'description_ar' => 'required|string',
            'description_fr' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $course = new Course();
        $course->title_ar = $request->title_ar;
        $course->title_fr = $request->title_fr;
        $course->professor_ar = $request->instructor_ar;
        $course->professor_fr = $request->instructor_fr;
        $course->price = $request->price;
        $course->heur = $request->duration;
        $course->description_ar = $request->description_ar;
        $course->description_fr = $request->description_fr;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $course->image = 'uploads/courses/' . $imageName;
        }

        $course->save();

        return redirect()->back()->with('success', 'تم إضافة الدورة بنجاح');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.edit_course', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ar' => 'required',
            'title_fr' => 'required',
            'instructor_ar' => 'required',
            'instructor_fr' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
            'description_ar' => 'required',
            'description_fr' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $course = Course::findOrFail($id);
        $course->title_ar = $request->title_ar;
        $course->title_fr = $request->title_fr;
        $course->professor_ar = $request->instructor_ar;
        $course->professor_fr = $request->instructor_fr;
        $course->price = $request->price;
        $course->heur = $request->duration;
        $course->description_ar = $request->description_ar;
        $course->description_fr = $request->description_fr;

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            if(file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $course->image = 'uploads/courses/' . $imageName;
        }

        $course->save();

        return redirect()->route('all.courses')->with('success', 'تم تحديث الدورة بنجاح');
    }
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // حذف الصورة من المجلد
        if(file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }

        $course->delete();

        return redirect()->route('all.courses')->with('success', 'تم حذف الدورة بنجاح');
    }




    public function topics()
    {

        return view('admin.Course_topics');
    }

    public function storeTopic(Request $request)
    {
        $messages = [
            'title_ar.required' => 'عنوان المحور بالعربية مطلوب',
            'title_fr.required' => 'عنوان المحور بالفرنسية مطلوب',
            'course_id.required' => 'يجب اختيار الدورة',
            'course_id.exists' => 'الدورة المختارة غير موجودة',
            'video.required' => 'ملف الفيديو مطلوب',
            'video.mimes' => 'يجب أن يكون الملف من نوع: mp4, mov, ogg, qt',
            'order.required' => 'يجب تحديد نوع الفيديو',
            'order.in' => 'قيمة نوع الفيديو غير صحيحة'
        ];

        $validator = Validator::make($request->all(), [
            'title_ar' => 'required',
            'title_fr' => 'required',
            'course_id' => 'required|exists:courses,id',
            'video' => 'required|mimes:mp4,mov,ogg,qt',
            'order' => 'required|in:0,1'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $topic = new videos();
        $topic->title_ar = $request->title_ar;
        $topic->title_fr = $request->title_fr;
        $topic->course_id = $request->course_id;
        $topic->order = $request->order;

        $topic->description_ar = $request->description_ar;
        $topic->description_fr = $request->description_fr;
        $topic->status = 'active';


        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName);
            $topic->video_url = 'uploads/videos/' . $videoName;
        }

        $topic->save();

        return redirect()->back()->with('success', 'تم إضافة الموضوع والفيديو بنجاح');
    }

    public function add_topic()
    {
        return view('admin.topics_cours');
    }
    public function adddTopic(Request $request)
    {
        $messages = [
            'title_ar.required' => 'عنوان المحور بالعربية مطلوب',
            'title_fr.required' => 'عنوان المحور بالفرنسية مطلوب',
            'course_id.required' => 'يجب اختيار الدورة',
            'course_id.exists' => 'الدورة المختارة غير موجودة'
        ];

        $validator = Validator::make($request->all(), [
            'title_ar' => 'required',
            'title_fr' => 'required',
            'course_id' => 'required|exists:courses,id'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $topic = new course_topics();
        $topic->title_ar = $request->title_ar;
        $topic->title_fr = $request->title_fr;
        $topic->course_id = $request->course_id;
        $topic->order = $request->order;
        $topic->save();

        return redirect()->back()->with('success', 'تم إضافة المحور بنجاح');
    }
    public function edite()
    {
        $course_topics = videos::all();
        return view('admin.Course_edite',compact('course_topics'));
    }


    public function my_requests()
    {
        $user = auth()->user();
        $user_courses = user_courses::where('user_id', $user->id)
                              ->with('course')
                              ->get();

        return view('site.my_requests', compact('user_courses'));
    }


    public function enroll($id)
    {
        if(auth()->check() && auth()->user()->role == 'admin'){
            return redirect()->back()->with('error', 'لا يمكن للأدمن الاشتراك في الدورة');
        }
        else{
        $course = Course::findOrFail($id);
        $user = auth()->user();

        // التحقق مما إذا كان المستخدم مسجل بالفعل في الدورة



            // التحقق من عدم وجود تسجيل سابق للمستخدم في نفس الدورة
            $existingEnrollment = user_courses::where('course_id', $course->id)
                                            ->where('user_id', $user->id)
                                            ->first();

            if ($existingEnrollment) {
                return redirect()->back()->with('error', 'أنت مسجل بالفعل في هذه الدورة');
            }

            $uc = new user_courses;
            $uc->course_id = $course->id;
            $uc->user_id = $user->id;
            $uc->status = 'no';
            $uc->save();

        return redirect()->back()->with('success', 'تم تسجيل طلبك  بنجاح');
        }
    }











    // public function active()
    // {
    //     return view('admin.courses_active');
    // }
    // public function suspended()
    // {
    //     return view('admin.suspended_courses');
    // }
    public function categories()
    {
        return view('admin.course_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function destroyTopic($id)
    {
        try {
            $topic = videos::findOrFail($id);
            $topic->delete();

            return redirect()->back()->with('success', 'تم حذف المحور بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء حذف المحور');
        }
    }
    public function editTopic($id)
    {
        $topic = videos::findOrFail($id);
        return view('admin.Courses_edite',compact('topic'));
    }
    public function updateTopic(Request $request, $id)
    {
        try {
            $topic = videos::findOrFail($id);

            $validatedData = $request->validate([
                'title_ar' => 'required|string|max:255',
                'title_fr' => 'required|string|max:255',
                'order' => 'required'
            ]);

            $topic->title_ar = $validatedData['title_ar'];
            $topic->title_fr = $validatedData['title_fr'];
            $topic->order = $validatedData['order'];
            if ($request->hasFile('videos')) {
                $video = $request->file('videos');
                $filename = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('videos'), $filename);
                $topic->video_url = $filename;
            }
            $topic->save();

            return redirect()->back()->with('success', 'تم تحديث الدرس بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث الدرس');
        }
    }

}
