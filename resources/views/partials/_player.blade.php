<!----Audio Player Section---->
<div class="ms_player_wrapper">
    <div class="ms_player_close">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <div class="player_mid">
        <div class="audio-player">
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                <div class="player_left">
                    <div class="ms_play_song">
                        <div class="play_song_name">
                            <a href="javascript:void(0);" id="playlist-text">
                                <div class="jp-now-playing flex-item">
                                    <div class="jp-track-name"></div>
                                    <div class="jp-artist-name"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="play_song_options">
                        <ul>
                            <li>
                                <a href="javascript:;" class="add-to-playlist">
                                    <span class="song_optn_icon"><i class="ms_icon icon_playlist"></i></span>
                                    Ajouter à la playlist
                                </a>
                            </li>
                            {{-- <li>
                                <a href="javascript:;" class="share-song">
                                    <span class="song_optn_icon"><i class="ms_icon icon_share"></i></span>
                                    Partager
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <span class="play-left-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </div>
                <!----Right Queue---->
                <div class="jp_queue_wrapper">
                    <span class="que_text" id="myPlaylistQueue"><i class="fa fa-angle-up" aria-hidden="true"></i>
                        playlist</span>
                    <div id="playlist-wrap" class="jp-playlist">
                        <div class="jp_queue_cls">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                        <h2>Votre liste d'écoute</h2>
                        <div class="jp_queue_list_inner">
                            <ul class="playlist-items">
                                <li>&nbsp;</li>
                                <!-- La playlist affichée dynamiquement ici -->
                            </ul>
                        </div>
                        <div class="jp_queue_btn">
                            <a href="javascript:;" class="ms_clear" id="clear-playlist">Effacer</a>
                            {{-- <a href="javascript:;" class="ms_save" id="save-playlist">Sauvegarder</a> --}}
                        </div>
                    </div>
                </div>
                <div class="jp-type-playlist">
                    <div class="jp-gui jp-interface flex-wrap">
                        <div class="jp-controls flex-item">
                            <button class="jp-previous" tabindex="0"><i class="ms_play_control"></i></button>
                            <button class="jp-play" tabindex="0"><i class="ms_play_control"></i></button>
                            <button class="jp-next" tabindex="0"><i class="ms_play_control"></i></button>
                        </div>
                        <div class="jp-progress-container flex-item">
                            <div class="jp-time-holder">
                                <span class="jp-current-time" role="timer" aria-label="time">&nbsp;</span>
                                <span class="jp-duration" role="timer" aria-label="duration">&nbsp;</span>
                            </div>
                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar">
                                        <div class="bullet">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jp-volume-controls flex-item">
                            <div class="widget knob-container">
                                <div class="knob-wrapper-outer">
                                    <div class="knob-wrapper">
                                        <div class="knob-mask">
                                            <div class="knob d3">
                                                <span></span>
                                            </div>
                                            <div class="handle"></div>
                                            <div class="round">
                                                <img src="{{ asset('PlayerTemplate/images/svg/volume.svg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
