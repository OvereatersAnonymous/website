<div class="tabs__wpmeetings">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_F2F ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_F2F; @endphp">{!! __('Face-To-Face','sage') !!}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_ONLINE ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_ONLINE; @endphp">{!! __('Online','sage') !!}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_PHONE ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_PHONE; @endphp">{!! __('Telephone','sage') !!}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_NRT ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_NRT; @endphp">{!! __('Non-Real-Time','sage') !!}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_SB ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_SB; @endphp">{!! __('Find Service Body','sage') !!}</a>
    </li>
  </ul>
</div>