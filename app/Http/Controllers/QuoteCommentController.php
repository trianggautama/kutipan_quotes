<?php

namespace App\Http\Controllers;
use Auth;
use App\models\User;
use App\models\quote;
use App\models\QuoteComments;
use App\models\notification;

use Illuminate\Http\Request;

class QuoteCommentController extends Controller
{


      public function store(Request $request,$id)
      {

        $this->validate($request, [
          'subject'=>'required|min:5',
        ]);

        $quote=Quote::findOrFail($id);

        $quotes = QuoteComments::create([

          'subject' => $request->subject,
          'quote_id'  => $id,
         'user_id'  =>  Auth::user()->id
        ]);

        if ($quote->user->id != Auth::user()->id) {
        notification::create([
          'user_id'=>$quote->user->id,
          'quote_id'=>$id,
          'subject'=>'ada komentar dari '. Auth::user()->name,

        ]);
}
        return redirect('/quotes/'.$quote->slug )->with('msg','komentar berhasil dikirim');
        }


      public function edit($id)
      {
        $comment=QuoteComments::findOrFail($id);
        return view('quote-comments.edit',compact('comment'));

      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
          $comment = QuoteComments::findOrFail($id);
          if ($comment->owner())
          $comment->update([
            'subject'=>$request->subject,
          ]);
          else abort(403);
          return redirect('/quotes/'.$comment->quote->slug)->with('msg','komentar berhasil di edit');

      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        $comment = QuoteComments::findOrFail($id);
        if ($comment->owner())
          $comment->delete();

        else abort(403);
        return redirect('/quotes/'.$comment->quote->slug)->with('msg','komentar berhasil di hapus');

      }




}
