(function( $ ) {
    
    'use strict';
    
    $( document ).ready( function(){
        
        if ( typeof bbsVars !== 'undefined' ) {
    
            var wpABActive = 'top: 0;',
                bbLinks = '',
                body = $('body');
            
            var wpabActive = bbsVars.wpabActive,
                currentSite = bbsVars.currentSite,
                options = bbsVars.options;
    
            
            if ( wpabActive )
                wpABActive = 'top: 32px;';
            

            if ( typeof options !== 'undefined' && options.length !== 0 ) {
                
                if ( typeof options.blackbar__general_settings === 'object' ) {
                    
                    var settings = options.blackbar__general_settings[0];
                    var bbBGColor = ( settings.blackbar__general_settings_background_color !== '' )
                            ? 'background-color: ' + settings.blackbar__general_settings_background_color
                            : '';
                    
                }
                
                if ( typeof options.blackbar__sites === 'object' ) {
                    
                    var sites = options.blackbar__sites;
                    
                    for (var i = 0; i < Object.keys( sites ).length; i++) {
        
                        if ( typeof sites[i] === 'object') {
            
                            var link = ( sites[i].blackbar__site_icon !== 0 )
                                ? '<img src="' + sites[i].blackbar__sites_icon + '" alt="logo"/>'
                                : sites[i].blackbar__sites_link;
                            
                            bbLinks += '<li class="link">';
                            
                            if ( currentSite !== '' && currentSite === window.location.host && sites[i].blackbar__sites_link.includes( currentSite ) )
                                bbLinks += '   <a class="current-site" href="#" ' + '>' + link + '</a>';
                            else
                                bbLinks += '   <a href="' + sites[i].blackbar__sites_link + '" ' + '>' + link + '</a>';
                            
                            bbLinks += '</li>';
            
                        }
        
                    }
    
                }
        
            }
    
            
            var blackBar = '<div id="BBS" class="bbs" style="' + wpABActive + bbBGColor + '">\n' +
                            '    <div class="bbs_wrapper">\n' +
                            '        <div class="menu">\n' +
                            '            <ul class="links">\n' +
                            '                ' + bbLinks +
                            '            </ul>\n' +
                            '        </div>\n' +
                            '    </div>\n' +
                            '</div>';
            
            
            body.append( blackBar )
                .css( { 'padding-top' : '40px' } );
            
        }
        
    });
    
})( jQuery );