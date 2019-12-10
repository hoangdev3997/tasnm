@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->id }}" class="media">
@else
  <li id="comment-{{ $comment->id }}" class="media">
@endif
    <table class="table table-striped table-bordered">
        <tr>
            <td style="width: 50%;">
                <strong>{{ $comment->commenter->email ?? $comment->guest_name }}</strong>
            </td>
            <td class="text-right">{{ $comment->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
            <td colspan="2">
                {{-- <p style="padding-bottom: 8px;font-weight:bold;">nhokcodoc468@gmail.com</p> --}}
                <p class="text an-text">{!! $markdown->line($comment->comment) !!}</p>
                <div style="float:right;">
                    @can('reply-to-comment', $comment)
                        <button data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase">Trả lời</button>
                    @endcan
                    @can('edit-comment', $comment)
                        <button data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-sm btn-link text-uppercase">Sửa</button>
                    @endcan
                    @can('delete-comment', $comment)
                        <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-sm btn-link text-danger text-uppercase">Xóa</a>
                        <form id="comment-delete-form-{{ $comment->id }}" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endcan
                </div>
            </td>
        </tr>
    </table>
    <div class="text-right" style="border: 1px dashed rgba(239, 102, 68, 0.25);"></div>
    <div class="media-body" style="padding-left: 50px;">
        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" style="display: inline-block;">Sửa bình luận</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group" style="padding: 0 15px; ">
                                    <label for="message">Cập nhật nội dung ở đây :</label>
                                    <textarea required class="form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Cập nhật</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Hủy bỏ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" style="display: inline-block;">Trả lời bình luận</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group" style="padding: 0 15px; ">
                                    <label for="message">Nhập nội dung ở đây :</label>
                                    <textarea required class="form-control" name="message" rows="3" style=" width: 100%; "></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Trả lời</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">Hủy bỏ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        {{-- Recursion for children --}}
        @if($grouped_comments->has($comment->id))
            @foreach($grouped_comments[$comment->id] as $child)
                @include('comments::_comment', [
                    'comment' => $child,
                    'reply' => true,
                    'grouped_comments' => $grouped_comments
                ])
            @endforeach
        @endif

    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif
