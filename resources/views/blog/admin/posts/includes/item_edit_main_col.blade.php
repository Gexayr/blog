@php
    /** @var \App\Models\BlogCategory $item */
    /** @var \Illuminate\Support\Collection $categoryOption */
@endphp
<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if($item->is_published)
                        Опубликовано
                    @else
                        Черновик
                    @endif
                </div>
                <div class="card-body">
                    <div class="card-title"></div>
                    <div class="card-subtitle mb-2 text-muted"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <div class="form-group">
                                <label for="title">Загаловок</label>
                                <input name="title" value="{{ $item->title }}"
                                       id="title"
                                       type="text"
                                       class="form-control"
                                       minlength="3"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="slug">Статья</label>
                                <textarea name="content_raw"
                                       id="slug"
                                       rows="20"
                                       class="form-control">
                                {{old('content_raw', $item->content_raw) }}
                                </textarea>
                            </div>
                        </div>

                        <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                                <label for="parent_id">Категория</label>
                                <select name="category_id" value="{{ $item->slug }}"
                                        id="category_id"
                                        class="form-control"
                                        required>
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->category_id) selected @endif>
                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="slug">Идентификатор</label>
                                <input name="slug" value="{{ $item->slug }}"
                                       id="slug"
                                       type="text"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">excerpt</label>
                                <textarea name="excerpt" id="excerpt" rows="3" class="form-control">
{!! old('excerpt', $item->excerpt) !!}
                                </textarea>
                            </div>

                            <div class="form-check">
                                <input type="hidden" name="is_published" value="0">

                                    <input name="is_published"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="{{$item->is_published}}"
                                        @if($item->is_published)
                                            checked="checked"
                                        @endif/>
                                <label class="form-check-label" for="is_published">Опубликовано</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
