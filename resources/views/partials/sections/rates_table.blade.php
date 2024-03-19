@if($content->hide_section == 'no')

    <section class="rates-table @if($content->extra_class){{$content->extra_class}}@endif" @if($content->id) id="{{$content->id}}" @endif>
        <div class="container-fluid">
            <div class="bg-white rates-table-inner">
                <div class="p-50 mdscreen:p-20">
                    <table class="table-auto w-full">
                        @if(!empty($content->tabel_heading))
                            <thead>
                                <tr>
                                    @foreach($content->tabel_heading as $heading)
                                        <th>{!! $heading['tb_heading'] !!}</th>
                                    @endforeach
                                </tr>
                            </thead>
                        @endif
                        @if(!empty($content->tabel_content))
                            <tbody>
                                @foreach($content->tabel_content as $value)
                                    <tr>
                                        @foreach($value['tb_content'] as $tbContent)
                                            <td>{!! $tbContent['table_content_rates'] !!}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                    @if(!empty($content->tabel_tagline))
                        <span class="text-14 text-opacity-70 text-green font-400 pt-20 pl-100 desktop2:pl-[130px] xlscreen:pl-[50px] lgscreen:text-center lgscreen:w-full inline-block">{!! $content->tabel_tagline !!}</span>
                    @endif
                    @if(!empty($content->download_rates))
                        <div class="btn-custom flex items-center justify-center mt-60 lgscreen:mt-30">
                            <a href="{!! $content->download_rates['url'] !!}" class="btn btn-link green">{!! $content->download_rates['title'] !!}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif