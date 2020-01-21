<div class="tabs__wpmeetings">
  <ul class="nav nav-tabs desktop">
    <li class="nav-item face-to-face">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_F2F ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_F2F; @endphp">{!! __('Face-To-Face','sage') !!}</a>
    </li>
    <li class="nav-item online">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_ONLINE ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_ONLINE; @endphp">{!! __('Online','sage') !!}</a>
    </li>
    <li class="nav-item telephone">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_PHONE ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_PHONE; @endphp">{!! __('Telephone','sage') !!}</a>
    </li>
    <li class="nav-item nrt">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_NRT ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_NRT; @endphp">{!! __('Non-Real-Time','sage') !!}</a>
    </li>
    <li class="nav-item service-bodies">
      <a class="nav-link @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_SB ? 'active' : '')@endphp" href="/find-a-meeting/?type=@php echo WPMEETINGS_SB; @endphp">{!! __('Find a Service Body','sage') !!}</a>
    </li>
  </ul>
</div>
<div class="nav nav-select mobile">
  <select id="nav-select" class="select-field">
    <option @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_F2F ? 'selected' : '')@endphp value="/find-a-meeting/?type=@php echo WPMEETINGS_F2F; @endphp">{!! __('Face-To-Face','sage') !!}</option>
    <option @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_ONLINE ? 'selected' : '')@endphp value="/find-a-meeting/?type=@php echo WPMEETINGS_ONLINE; @endphp">{!! __('Online','sage') !!}</option>
    <option @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_PHONE ? 'selected' : '')@endphp value="/find-a-meeting/?type=@php echo WPMEETINGS_PHONE; @endphp">{!! __('Telephone','sage') !!}</option>
    <option @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_NRT ? 'selected' : '')@endphp value="/find-a-meeting/?type=@php echo WPMEETINGS_NRT; @endphp">{!! __('Non-Real-Time','sage') !!}</option>
    <option @php echo (isset($_GET['type']) && $_GET['type'] == WPMEETINGS_SB ? 'selected' : '')@endphp value="/find-a-meeting/?type=@php echo WPMEETINGS_SB; @endphp">{!! __('Find Service Body','sage') !!}</option>
  </select>
</div>
