{OVERALL_GAME_HEADER}
<div id="main-container">
	<div id="board-wrapper">
		<div id='board'>
			<div id='map'>
				<div id='cities'>
				    <!-- BEGIN city -->
				        <div id="city_{ID}" class="map_node city" style="left: {X}px; top: {Y}px;" data-name="{NAME}"></div>
				    <!-- END city -->
				</div>
				<div id='locations'>
				    <!-- BEGIN location -->
				        <div id="{ID}" class="map_node location" style="left: {X}px; top: {Y}px;"></div>
				    <!-- END location -->
				</div>
			</div>
		</div>
	</div>
	<div id="player-hand"></div>
	<div id="other-boards-wrapper">
		<div id="other-boards">
			<div id="player-boards"></div>
			<div id="religious-struggle"></div>
		</div>
	</div>
</div>
{OVERALL_GAME_FOOTER}
