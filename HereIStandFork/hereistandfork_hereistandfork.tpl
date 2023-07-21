{OVERALL_GAME_HEADER}
<h1> CHANGE </h1>
	<div id="board-wrapper">
		<div id='board'>
			<div id='map'>
				<div id='cities'>
				    <!-- BEGIN city -->
				        <div id="city_{ID}" class="map_node city" style="left: {X}px; top: {Y}px;" data-name="{NAME}"></div>
				    <!-- END city -->
				</div>
				<div id='map-locations'>
				    <!-- BEGIN map_location -->
				        <div id="location_{ID}" class="map_node location" style="left: {X}px; top: {Y}px;" data-id="{ID}"></div>
				    <!-- END map_location -->
				</div>
			</div>
		</div>
	</div>
	<div id="player-hand"></div>
	<div id="other-boards-wrapper">
		<div id="other-boards">
			<div id="power-cards">
				<div id='power-cards-locations'>
				    <!-- BEGIN power_card_location -->
				        <div id="location_{ID}" class="map_node location" style="left: {X}px; top: {Y}px;" data-id="{ID}"></div>
				    <!-- END power_card_location -->
				</div>
			</div>
			<div id="religious-struggle">
				<div id='religious-struggle-locations'>
				    <!-- BEGIN religious_struggle_location -->
				        <div id="location_{ID}" class="map_node location" style="left: {X}px; top: {Y}px;" data-id="{ID}"></div>
				    <!-- END religious_struggle_location -->
				</div>
			</div>
		</div>
	</div>
</div>
{OVERALL_GAME_FOOTER}
