@if($actscount > 0)
<div class="timeline">
    <?php $count = 9000; ?>
    @foreach($actdata as $act)
    <?php $count = $count - 1; ?>
    <div class="timeline-item" style="z-index: <?php echo"$count"; ?>; background-color: var(--color{{$act->act_number}});">
        <div class="arrow-end" style="border-left: 15px solid var(--color{{$act->act_number}});"></div>
        <div class="content-half-circle"></div>
        <div class="grey-line"></div>
        <a href="/act/{{$act->id}}">
        <div class="buble-content">
            <div class="content-year" style="background-color: var(--color{{$act->act_number}});">{{$act->title}}</div>
            <div class="content">
                <p>ACT {{$act->act_number}}</p>
            </div>
        </div>
        </a>
        <?php $backgroundimg = asset('/images/archetypes/'.$act->archetype_name.'.png'); ?>
        <div class="circle" style="background-color: var(--color{{$act->act_number}});">
            <a href="/archetype/{{$act->archetypeid}}" data-toggle="tooltip" data-placement="left" title="{{$act->archetype_name}}"><div class="inner-circle" style="background-image:url('<?php echo"$backgroundimg"; ?>')"></div></a>
        </div>
    </div>
    @endforeach  
</div>
@endif
