<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // error_log('Showing user profile for user: '.$request->input('subject_stream'));
        if ($request->input('subject_stream') == 'Physical' or $request->input('subject_stream') == 'Bio') {
            
            if ($request->hasFile('nic_front') && $request->hasFile('nic_back')) {
                //  Let's do everything here
                if ($request->file('nic_front')->isValid() && $request->file('nic_back')->isValid()) {
                    
                    $validated = $request->validate([
                        'full_name' => ['required'],
                        'school_name',
                        'subject_stream' => ['required'],
                        'exam_year' => ['required'],
                        'attempt' => ['required'],
                        'closet_town' => ['required'],
                        'district' => ['required'],
                        'address' => ['required'],
                        'nic_no' => ['required','unique:users'],
                        'nic_front' => ['required','mimes:jpeg,bmp,png','max:20480'],
                        'nic_back' => ['required','mimes:jpeg,bmp,png','max:20480'],
                        'email' => ['required','unique:users','confirmed'],
                        'mobile' => ['required','unique:users','confirmed'],
                        'del_mobile_1',
                        'del_mobile_2'
                    ]);

                    $extension = $request->nic_front->extension();
                    $request->nic_front->storeAs('/public/nicImages', $validated['nic_no']."_front.".$extension);
                    $nic_front = Storage::url($validated['nic_no']."_front.".$extension);

                    $extension = $request->nic_back->extension();
                    $request->nic_back->storeAs('/public/nicImages', $validated['nic_no']."_back.".$extension);
                    $nic_back = Storage::url($validated['nic_no']."_back.".$extension);
                }
            } else {
                abort(500, 'Could not upload image :(');
            }
        } else {
            $validated = $request->validate([
                'full_name' => ['required'],
                'school_name',
                'subject_stream' => ['required'],
                'exam_year' => ['required'],
                'attempt' => ['required'],
                'closet_town' => ['required'],
                'district' => ['required'],
                'address' => ['required'],
                'nic_no' => ['required','unique:users'],
                'email' => ['required','unique:users','confirmed'],
                'mobile' => ['required','unique:users','confirmed'],
                'del_mobile_1',
                'del_mobile_2'
            ]);

            $nic_front = null;
            $nic_back = null;
        }

        // User::create($request->all());
        User::create([
            'full_name' => $request->full_name,
            'school_name' => $request->school_name,
            'subject_stream' => $request->subject_stream,
            'exam_year' => $request->exam_year,
            'attempt' => $request->attempt,
            'closet_town' => $request->closet_town,
            'district' => $request->district,
            'address' => $request->address,
            'nic_no' => $request->nic_no,
            'nic_front' => $nic_front,
            'nic_back' => $nic_back,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'del_mobile_1' => $request->del_mobile_1,
            'del_mobile_2' => $request->del_mobile_2
        ]);

        return redirect()->route('student.create')->with('success', 'You have registerd, a confirmation email will sent to '. $request->email);
    }
}
