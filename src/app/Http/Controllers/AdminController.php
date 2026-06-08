<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $keyword = $request->keyword;
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%")
                    ->orWhereRaw(
                        "CONCAT(last_name, first_name) LIKE ?",
                        ["%{$keyword}%"]
                    )
                    ->orWhereRaw(
                        "CONCAT(last_name, ' ', first_name) LIKE ?",
                        ["%{$keyword}%"]
                    );
            });
        }
        if ($request->gender && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }
        $contacts = $query
            ->paginate(7)
            ->appends($request->all());
        return view('admin.contacts', compact('contacts'));
    }

    public function show($id){
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect('/admin/contacts');
    }


    public function export(Request $request)
    {
        $query = Contact::query();

        if ($request->keyword) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%")
                    ->orWhereRaw(
                        "CONCAT(last_name, first_name) LIKE ?",
                        ["%{$keyword}%"]
                    )
                    ->orWhereRaw(
                        "CONCAT(last_name, ' ', first_name) LIKE ?",
                        ["%{$keyword}%"]
                    );
            });
        }

        if ($request->gender && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->get();

        $csvHeader = [
            'ID',
            '姓',
            '名',
            '性別',
            'メールアドレス',
            '電話番号',
            '住所',
            '建物名',
            'お問い合わせ内容',
        ];

        $callback = function () use ($contacts, $csvHeader) {

            $file = fopen('php://output', 'w');

            fputcsv($file, $csvHeader);

            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->id,
                    $contact->last_name,
                    $contact->first_name,
                    $contact->gender,
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    $contact->detail,
                ]);
            }

            fclose($file);
        };

        return response()->streamDownload(
            $callback,
            'contacts.csv',
            ['Content-Type' => 'text/csv']
        );
    }

}

