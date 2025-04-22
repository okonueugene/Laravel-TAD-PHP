@extends('layout.app')
<style>
    h4 {
        margin-top: 20px;
    }

    select {
        margin-bottom: 10px;
    }

    #dispatch-button {
        margin-top: 20px;
    }
</style>

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span>Enviromental Policy Checklist</h4>

        <div class="card card-bordered">
            <div class="card-body">
                <form id="environmental-policy-checklist">
                    @csrf
                    <div class="checklist" style="margin-top: 10px;">
                        <!-- Environmental Policy Section -->
                        <h4>Environmental Policy</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Is the Environmental Policy displayed on site?</label>
                                    <select class="form-select" name="policy_displayed" id="policy_displayed">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Is the Policy up to date?</label>
                                    <select class="form-select" name="policy_up_to_date" id="policy_up_to_date">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Is the Policy signed by the CEO?</label>
                                    <select class="form-select" name="policy_signed_by_ceo" id="policy_signed_by_ceo">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are Environmental factors included in Risk Assessments? </label>
                                    <select class="form-select" name="environmental_factors_included_in_risk_assessments"
                                        id="environmental_factors">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are Environmental emergency procedures adequately
                                        addressed and displayed? </label>
                                    <select class="form-select"
                                        name="environmental_emergency_procedures_adequately_addressed"
                                        id="environmental_emergency_procedures">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are Environmental issues adequately addressed at site
                                        induction? </label>
                                    <select class="form-select"
                                        name="environmental_issues_adequately_addressed_at_site_induction"
                                        id="environmental_issues">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are Environmental control measures described in method
                                        statements? </label>
                                    <select class="form-select"
                                        name="environmental_control_measures_described_in_method_statements"
                                        id="environmental_control_measures">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are all operatives briefed and aware of good Environmental
                                        practices? </label>
                                    <select class="form-select"
                                        name="operatives_briefed_and_aware_of_good_environmental_practices"
                                        id="operatives_briefed">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are sub-contractors conforming to the company's
                                        Environmental Policy? </label>
                                    <select class="form-select"
                                        name="sub_contractors_conforming_to_company_environmental_policy"
                                        id="sub_contractors_conforming">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Site Establishment --}}
                        <h4>Site Establishment</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Are site cabins clean and in good condition?</label>
                                    <select class="form-select" name="site_cabins_clean_and_in_good_condition"
                                        id="site_cabins_clean">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are there adequate parking facilities off/onsite?</label>
                                    <select class="form-select" name="adequate_parking_facilities_off_onsite"
                                        id="adequate_parking_facilities">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are fences, hoardings, and gates in good condition?</label>
                                    <select class="form-select" name="fences_hoardings_and_gates_in_good_condition"
                                        id="fences_hoardings">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Waste Management --}}
                        <h4>Waste Management</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Is there any existing contamination onsite? Is it being dealt
                                        with adequately? </label>
                                    <select class="form-select" name="existing_contamination_onsite"
                                        id="existing_contamination_onsite">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are transfer notes (consignment notes for special waste) in
                                        place?</label>
                                    <select class="form-select" name="transfer_notes_in_place"
                                        id="transfer_notes_in_place">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are adequate segregation measures in place? </label>
                                    <select class="form-select" name="adequate_segregation_measures_in_place"
                                        id="adequate_segregation_measures">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Energy Management --}}
                        <h4>Energy Management</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Is electrical power for light and heat kept at a minimum
                                        period?</label>
                                    <select class="form-select" name="electrical_power_for_light_and_heat_kept_at_minimum"
                                        id="electrical_power_for_light_and_heat">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Is water usage minimized?</label>
                                    <select class="form-select" name="water_usage_minimized" id="water_usage_minimized">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Is plant shut down when not in use?</label>
                                    <select class="form-select" name="plant_shut_down_when_not_in_use"
                                        id="plant_shut_down">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Water Protection --}}
                        <h4>Water Protection</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Are consents in place for the discharge of water?</label>
                                    <select class="form-select" name="consents_in_place_for_discharge_of_water"
                                        id="consents_in_place_for_discharge_of_water">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are drains identified (surface and sewer)?</label>
                                    <select class="form-select" name="drains_identified" id="drains_identified">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Is silt being prevented from discharging to watercourses?</label>
                                    <select class="form-select" name="silt_prevented_from_discharging_to_watercourses"
                                        id="silt_prevented_from_discharging">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are fuel tanks, bowsers, and drums within a bund to EA
                                        guidelines? </label>
                                    <select class="form-select" name="fuel_tanks_within_bund_to_ea_guidelines"
                                        id="fuel_tanks_within_bund">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are drip trays in place for plant and fuelling points?</label>
                                    <select class="form-select" name="drip_trays_in_place_for_plant_and_fuelling_points"
                                        id="drip_trays_in_place">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are emergency measures in place (spill kits)?</label>
                                    <select class="form-select" name="emergency_measures_in_place"
                                        id="emergency_measures_in_place">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are all chemicals stored safely and marked?</label>
                                    <select class="form-select" name="chemicals_stored_safely_and_marked"
                                        id="chemicals_stored_safely">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Is plant in good condition and without any leaks? </label>
                                    <select class="form-select" name="plant_in_good_condition_and_without_any_leaks"
                                        id="plant_in_good_condition">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are plant and materials reasonably kept away from drains
                                        and watercourses?</label>
                                    <select class="form-select" name="plant_and_materials_kept_away_from_drains"
                                        id="plant_and_materials_kept_away">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are wheel washes suitably constructed and contained?</label>
                                    <select class="form-select" name="wheel_washes_suitably_constructed_and_contained"
                                        id="wheel_washes_suitably_constructed">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Material Management --}}
                        <h4>Material Management</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Are there alternative arrangements for unused materials
                                        other than disposal?</label>
                                    <select class="form-select" name="alternative_arrangements_for_unused_materials"
                                        id="alternative_arrangements_for_unused_materials">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are materials such as hardwoods acquired from a sustainable
                                        source?</label>
                                    <select class="form-select" name="materials_acquired_from_sustainable_source"
                                        id="materials_acquired_from_sustainable_source">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are there arrangements to reuse/recycle existing site
                                        material? </label>
                                    <select class="form-select"
                                        name="arrangements_to_reuse_recycle_existing_site_material"
                                        id="arrangements_to_reuse_recycle_existing_site_material">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        {{-- Nuisance --}}
                        <h4>Nuisance</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Is dust suppression adequate?</label>
                                    <select class="form-select" name="dust_suppression_adequate"
                                        id="dust_suppression_adequate">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are noise and vibration within reasonable limits?</label>
                                    <select class="form-select" name="noise_and_vibration_within_reasonable_limits"
                                        id="noise_and_vibration_within_reasonable_limits">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are activities smokeless?</label>
                                    <select class="form-select" name="activities_smokeless" id="activities_smokeless">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Is there any inessential burning on-site?</label>
                                    <select class="form-select" name="inessential_burning_onsite"
                                        id="inessential_burning_onsite">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are deliveries arranged to minimize disruption to neighbors?</label>
                                    <select class="form-select"
                                        name="deliveries_arranged_to_minimize_disruption_to_neighbors"
                                        id="deliveries_arranged_to_minimize_disruption_to_neighbors">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are there arrangements to keep neighbors informed and
                                        liaison procedures?</label>
                                    <select class="form-select" name="arrangements_to_keep_neighbors_informed"
                                        id="arrangements_to_keep_neighbors_informed">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are site lights positioned away from neighbors?</label>
                                    <select class="form-select" name="site_lights_positioned_away_from_neighbors"
                                        id="site_lights_positioned_away_from_neighbors">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are site cabins screened from neighbors as appropriate?</label>
                                    <select class="form-select" name="site_cabins_screened_from_neighbors"
                                        id="site_cabins_screened_from_neighbors">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Flora & Fauna --}}
                        <h4>Flora & Fauna</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" style="margin-top: 10px;">
                                    <label>Is adequate protection in place for existing planted areas? </label>
                                    <select class="form-select"
                                        name="adequate_protection_in_place_for_existing_planted_areas"
                                        id="adequate_protection_in_place_for_existing_planted_areas">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <label>Are measures in place to protect initial life adequate?</label>
                                    <select class="form-select" name="measures_in_place_to_protect_initial_life"
                                        id="measures_in_place_to_protect_initial_life">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Completion and Sign-Off --}}
                    <h4>Completion and Sign-Off</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="futher_comments">Further Comments</label>
                                <textarea class="form-control" name="futher_comments" id="futher_comments" rows="3"></textarea>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="corrective_action">Corrective Actions</label>
                                <div class="actions-container">
                                    <ul id="corrective_actions_list" class="list-group">
                                    </ul>
                                </div>
                                <input type="hidden" name="corrective_action" id="corrective_action">
                                <button type="button" class="btn btn-primary" onclick="addAction()">Add
                                    Action</button>
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="project_manager">Project/Site Manager</label>
                                <input type="text" class="form-control" name="project_manager" id="project_manager">
                            </div>
                            <div class="form-group" style="margin-top: 10px;">
                                <label for="auditor">Auditor</label>
                                <input type="text" class="form-control" name="auditor" id="auditor">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="dispatch-button">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('environment') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('modals')
@endsection

@section('javascript')
    <script>
        function addAction() {
            // Create a new list item element for the step
            const newStep = document.createElement('li');
            newStep.classList.add('list-group-item');

            // Input field for step description
            const stepInput = document.createElement('input');
            stepInput.type = 'text';
            stepInput.classList.add('form-control');
            stepInput.placeholder = 'Enter Action Description';
            stepInput.addEventListener('input', () => updateStepsJson()); // Update JSON on input change

            newStep.appendChild(stepInput);

            // Button to remove the step
            const removeButton = document.createElement('button');
            removeButton.classList.add('btn', 'btn-sm', 'btn-danger');
            removeButton.textContent = 'Remove';
            removeButton.onclick = function() {
                this.parentNode.remove();
                updateStepsJson(); // Update JSON after removing a step
            };
            newStep.appendChild(removeButton);

            // Append the new step to the list
            const stepsList = document.getElementById('corrective_actions_list');
            stepsList.appendChild(newStep);
        }

        function updateStepsJson() {
            let steps = {}; // Initialize steps as an object

            const stepElements = document.querySelectorAll('#corrective_actions_list li input');

            let index = 1; // Start index from 1

            stepElements.forEach((element) => {
                const trimmedStep = element.value.trim();
                if (trimmedStep) {
                    steps[index] = trimmedStep; // Use index as key and step description as value
                    index++;
                }
            });

            const stepsJson = JSON.stringify(steps); // Convert object to JSON string

            document.getElementById('corrective_action').value = stepsJson;

            console.log(stepsJson);
        }




        // Listen for form submission
        $('#environmental-policy-checklist').on('submit', function(e) {
            e.preventDefault();

            // Initialize an empty object to store checklist data
            let checklist = {};

            // Get all select elements
            let selects = document.querySelectorAll('select');

            // Loop through each select element to capture its value and set it in the checklist object
            selects.forEach(select => {
                checklist[select.id] = select.value;
            });

            // Get other input values
            let comments = document.getElementById('futher_comments').value;
            let corrective_action = document.getElementById('corrective_action').value;
            let project_manager = document.getElementById('project_manager').value;
            let auditor = document.getElementById('auditor').value;

            //append the other input values to a new formData object
            let formData = {};

            formData.checklist = JSON.stringify(checklist);
            formData.comments = comments;
            formData.corrective_action = corrective_action;
            formData.project_manager = project_manager;
            formData.auditor = auditor;

            console.log(formData);


            //send the formData object to the server using Axios
            axios.post('{{ url('environment') }}', formData)
                .then(response => {
                    console.log(response.data);
                    if (response.status === 200) {
                        alert('Checklist submitted successfully');
                        window.location.href = '{{ url('environment') }}';
                    }
                })
                .catch(error => {
                    console.error(error);
                });


        });
    </script>
@endsection
